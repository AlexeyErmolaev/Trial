<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;
use Armor\Trial\Models\AccessExclusiveFileModel\AccessExclusiveFileEntityFactory;
use Armor\Trial\Models\AccessExclusiveFileModel\AccessExclusiveFileModel;
use Doctrine\ORM\EntityManager;
use Yii;

class DownloadExclusiveFileModelFacade extends DownloadExclusiveFileModelFacadeAbstract {
  protected $em;
  protected $author;

  /**
   * DownloadExclusiveFileModelFacade constructor.
   * @param EntityManager $em
   * @param $dir
   * @param $author
   */
  public function __construct(EntityManager $em, $dir, $author) {
    $this->em = $em;
    $this->author = $author;
    parent::__construct($dir);
  }
  protected function getEntityManager () {
    return $this->em;
  }
  protected function getDownloadModel() {
    return new DownloadExclusiveFileModel($this->getEntityManager());
  }
  protected function getExclusiveFileMode() {
    return new AccessExclusiveFileModel($this->getEntityManager());
  }
  protected function getDownloadEntityFactory() {
    return new DownloadExclusiveFileEntityFactory($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
  }
  protected function getAccessEntityFactory() {
    return new AccessExclusiveFileEntityFactory($this->author, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
  }
}