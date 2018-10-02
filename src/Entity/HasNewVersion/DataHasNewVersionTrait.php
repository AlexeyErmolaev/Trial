<?php
namespace Armor\Trial\Entity\HasNewVersion;
trait DataHasNewVersionTrait {
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\HasNewVersion\HasNewVersionEntity", cascade={"persist"})
   * @JoinColumn(name="data_id", referencedColumnName="data_id")
   * @var HasNewVersionEntityInterface
   */
  protected $hasNewVersionEntity;

  /**
   * @return HasNewVersionEntityInterface
   */
  public function getHasNewVersionEntity ()
  {
    return $this->hasNewVersionEntity;
  }

  /**
   * @param HasNewVersionEntityInterface $entity
   * @return $this
   */
  public function setHasNewVersionEntity(HasNewVersionEntityInterface $entity)
  {
    $this->hasNewVersionEntity = $entity;
    return $this;
  }
}