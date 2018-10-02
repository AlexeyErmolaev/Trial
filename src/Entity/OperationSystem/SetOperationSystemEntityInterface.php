<?php
namespace Armor\Trial\Entity\OperationSystem;
interface SetOperationSystemEntityInterface {
  /**
   * @param OperationSystemEntityInterface $entity
   * @return $this
   */
  public function setOperationSystem(OperationSystemEntityInterface $entity);
}