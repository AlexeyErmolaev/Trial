<?php
namespace Armor\Trial\Entity\AccessExclusiveFileEntity;
interface SetAccessExclusiveFileEntityInterface {
  /**
   * @param ExclusiveFileEntityInterface $entity
   * @return $this
   */
  public function setExclusiveFileEntity(ExclusiveFileEntityInterface $entity);
}