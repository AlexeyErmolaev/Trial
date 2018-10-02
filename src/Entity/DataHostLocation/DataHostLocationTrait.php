<?php
namespace Armor\Trial\Entity\DataHostLocation;
trait DataHostLocationTrait {
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\DataHostLocation\DataHostLocationEntity", cascade={"persist"})
   * @JoinColumn(name="data_id", referencedColumnName="data_id")
   * @var DataHostLocationEntityInterface.
   */
  protected $localhostEntity;

  /**
   * @return DataHostLocationEntityInterface
   */
  public function getHostLocation ()
  {
    return $this->localhostEntity;
  }

  /**
   * @param DataHostLocationEntityInterface $entity
   * @return $this
   */
  public function setHostLocation(DataHostLocationEntityInterface $entity)
  {
    $this->localhostEntity = $entity;
    return $this;
  }
}