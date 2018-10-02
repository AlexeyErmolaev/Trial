<?php
namespace Armor\Trial\Entity\AccessExclusiveFileEntity;
trait AccessExclusiveFileEntityTrait {
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\AccessExclusiveFileEntity\ExclusiveFileEntity", cascade={"persist"})
   * @JoinColumn(name="data_id", referencedColumnName="data_id")
   * @var ExclusiveFileEntity
   */
  protected $accessExclusiveFileEntity;
  /**
   * @return ExclusiveFileEntityInterface
   */
  public function getExclusiveFileEntity() {
    return $this->accessExclusiveFileEntity;
  }
  /**
   * @param ExclusiveFileEntityInterface $entity
   * @return $this
   */
  public function setExclusiveFileEntity(ExclusiveFileEntityInterface $entity) {
    $this->accessExclusiveFileEntity = $entity;
    return $this;
  }
}