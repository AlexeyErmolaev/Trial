<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;
use Armor\Trial\Models\AccessExclusiveFileModel\AccessExclusiveFileEntityFactoryInterface;
use Armor\Trial\Models\AccessExclusiveFileModel\AccessExclusiveFileModelInterface;
use GothicPrince\Download\Models\ActualVersionOfFile;

abstract class DownloadExclusiveFileModelFacadeAbstract implements DownloadExclusiveFileModelFacadeInterface {

  protected $dir;
  protected $releaseDir;
  protected $tmpPath;
  /**
   * @var AccessExclusiveFileEntityInterface
   */
  public $downloadEntity = null;
  public $downloadPath = null;

  const TYPE_ONLY_GA = 1;
  const TYPE_GA_OR_CONCRETE = 2;
  public function __construct($dir) {
    $this->dir = $dir;
  }
  /**
   * @return DownloadExclusiveFileModelInterface
   */
  abstract protected function getDownloadModel ();
  /**
   * @return AccessExclusiveFileModelInterface
   */
  abstract protected function getExclusiveFileMode ();

  /**
   * @return DownloadExclusiveFileEntityFactoryInterface
   */
  abstract protected function getDownloadEntityFactory ();

  /**
   * @return AccessExclusiveFileEntityFactoryInterface
   */
  abstract protected function getAccessEntityFactory ();
  public function setTempPath ($path) {
    $this->tmpPath = $path;
  }
  public function setReleaseDir ($path) {
    $this->releaseDir = $path;
  }
  protected function getTempPath () {
    return $this->tmpPath;
  }
  public function getDIR () {
    return $this->dir;
  }
  public function getReleaseDIR () {
    return $this->releaseDir;
  }
  public function addToLog ($customer, $url, $success) {
    $model = $this->getDownloadModel();
    try {
      $filename = $this->getFile()->getFileNameEntity()->getFileName();
    } catch (\Exception $e) {
      $filename = null;
    }
    $entity = $this->getDownloadEntityFactory()->create($customer, '', $url, $success, $filename);
    return $model->save($entity);
  }
  public function latest($os, $code, $customer) {
    $this->downloadEntity = $this->getExclusiveFileMode()->getLatestEntity($this->getDIR(), $customer, $code, $os);
    $this->downloadPath = $this->getDIR();
    return ($this->downloadEntity !== null);
  }
  /**
   * @param $os string
   * @param $code string
   * @param $customer string
   * @param $type int
   * @return bool
   */
  public function released ($os, $code, $customer, $type) {
    $type = intval($type);
    $this->downloadEntity = $this->getExclusiveFileMode()->getReleasedEntity($code, $customer, $os);
    if ($this->downloadEntity === null) {
      return false;
    }
    $actualExclusiveFile = new ActualVersionOfFile($this->getDIR(), $os);
    $actualReleasedFile = new ActualVersionOfFile($this->getReleaseDIR(), $os);

    $allFiles = $actualReleasedFile->ScanFiles();

    if ($type === self::TYPE_GA_OR_CONCRETE) {

      try {
        $latestFile = $this->getExclusiveFileMode()->getLatestEntity($this->getDIR(), $customer, $code, $os);
        if ($latestFile !== null) {
          $allFiles = array_merge(
            $actualReleasedFile->getEntities([
              $latestFile->getFileNameEntity()->getFileName()
            ])
            , $allFiles);
        }
      } catch (\Exception $exception) {}
    }

    $file = $actualExclusiveFile->GetActualVersionOfFile($allFiles);

    if (file_exists($this->getReleaseDIR() . $file->getFullName())) {
      $this->downloadPath = $this->getReleaseDIR();
    }
    if (file_exists($this->getDIR() . $file->getFullName())) {
      $this->downloadPath = $this->getDIR();
    }
    if ($this->downloadPath === null) {
      throw new \Exception('Not fount: ' . $this->getDIR() . $file->getFullName() . ' or ' . $this->getReleaseDIR() . $file->getFullName());
    }
    if ($file === null) {
      return false;
    }
    $this->downloadEntity->getFileNameEntity()->setFileName($file->getFullName());
    return true;
  }
  public function concrete($code, $customer, $filename) {
    $accessModel = $this->getExclusiveFileMode();
    $this->downloadEntity = $accessModel->getAccessibleEntity($customer, $filename, $code, '');
    $this->downloadPath = $this->getDIR();
    return $this->downloadEntity !== null;
  }
  public function remove($id) {
    $entity = $this->getExclusiveFileMode()->getFileByID($id);
    $model = $this->getDownloadModel();
    if ($model->remove($entity, $this->getDIR())) {
      return $this->getExclusiveFileMode()->remove($entity);
    }
    return false;
  }
  public function create($filename, $customer) {
    $entity = $this->getAccessEntityFactory()->create($customer, $filename);
    $model = $this->getDownloadModel();
    if ($filename !== null) {
      if ($model->upload($entity, $this->getDIR(), $this->getTempPath())) {
        return $this->getExclusiveFileMode()->save($entity);
      }
    } else {
      return $this->getExclusiveFileMode()->save($entity);
    }
    return false;
  }
  public function download() {
    if ($this->downloadPath === null or $this->downloadEntity === null) {
      throw new \Exception('Path and Entity should be defined');
    }
    $this->getDownloadModel()->download($this->downloadEntity, $this->downloadPath);
  }
  /**
   * @return AccessExclusiveFileEntityInterface
   */
  public function getFile () {
    return $this->downloadEntity;
  }
}