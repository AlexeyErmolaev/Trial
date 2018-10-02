<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;
use Armor\Trial\Entity\DownloadExclusiveFile\DownloadExclusiveFileEntityInterface;
interface DownloadExclusiveFileModelInterface {
  /**
   * @param DownloadExclusiveFileEntityInterface $entity
   * @return bool
   */
  public function save(DownloadExclusiveFileEntityInterface $entity);

  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @param $dir
   * @return boolean
   */
  public function download (AccessExclusiveFileEntityInterface $entity, $dir);

  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @param $dir string
   * @param $tempPathFile string
   * @return boolean
   */
  public function upload (AccessExclusiveFileEntityInterface $entity, $dir, $tempPathFile);

  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @param $dir string
   * @return boolean
   */
  public function remove (AccessExclusiveFileEntityInterface $entity, $dir);

  /**
   * @return DownloadExclusiveFileEntityInterface[]
   */
  public function getEntities ();
}