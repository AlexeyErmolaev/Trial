<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntity;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;
use Armor\Trial\Entity\DownloadExclusiveFile\DownloadExclusiveFileEntity;
use Armor\Trial\Entity\DownloadExclusiveFile\DownloadExclusiveFileEntityInterface;
use Armor\Trial\Models\AccessExclusiveFileModel\AccessExclusiveFileModel;
use Armor\Trial\Models\AccessExclusiveFileModel\AccessExclusiveFileModelInterface;
use Doctrine\ORM\EntityManager;

class DownloadExclusiveFileModel implements DownloadExclusiveFileModelInterface {
  /**
   * @var EntityManager
   */
  protected $em;
  public function __construct(EntityManager $em) {
    $this->em = $em;
  }
  /**
   * @param DownloadExclusiveFileEntityInterface $entity
   * @return bool
   */
  public function save(DownloadExclusiveFileEntityInterface $entity) {
    $this->em->persist($entity);
    $this->em->flush();
    return $entity->getDataBasicEntity()->getId() > 0;
  }
  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @param $dir
   * @return boolean
   */
  public function download(AccessExclusiveFileEntityInterface $entity, $dir) {
    $filename = $entity->getFileNameEntity()->getFileName();
    $path = $dir.$filename;
    if ((is_dir($path)) or (!file_exists($path))) {
      return false;
    }
    $filesize = filesize($path);
    header ("Content-Type: application/octet-stream");
    header ("Accept-Ranges: bytes");
    header('Content-Length: '.$filesize);
    header("Content-Range: 0-".($filesize-1)."/".$filesize);
    header ("Content-Disposition: attachment; filename=".$filename);
    readfile($path);
    return true;
  }
  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @param $dir string
   * @param $tempPathFile string
   * @return boolean
   */
  public function upload(AccessExclusiveFileEntityInterface $entity, $dir, $tempPathFile) {
    $model = $this->createAccessExclusiveFileModel();
    if ($model->save($entity)) {
      $uploadFile = $dir . '/' . basename($entity->getFileNameEntity()->getFileName());
      return move_uploaded_file($tempPathFile, $uploadFile);
    }
    return false;
  }

  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @param $dir string
   * @return boolean
   */
  public function remove(AccessExclusiveFileEntityInterface $entity, $dir) {
    $model = $this->createAccessExclusiveFileModel();
    if (unlink($dir . '/' . $entity->getFileNameEntity()->getFileName())) {
      return $model->remove($entity);
    }
    return false;
  }

  /**
   * @return AccessExclusiveFileModelInterface
   */
  protected function createAccessExclusiveFileModel() {
    return new AccessExclusiveFileModel($this->em);
  }

  /**
   * @return DownloadExclusiveFileEntityInterface[]
   */
  public function getEntities () {
    return $this->em
      ->getRepository(DownloadExclusiveFileEntity::class)
      ->findBy([
      'type' => DownloadExclusiveFileEntity::TYPE_DOWNLOAD_EXCLUSIVE_FILE
    ], [
      'data_id'=>'DESC'
    ]);
  }
}