<?php
namespace Armor\Trial\Entity\URL;
trait DataURLTrait {
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\URL\DataURLEntity", cascade={"persist", "remove"})
   * @JoinColumn(name="data_id", referencedColumnName="data_id")
   * @var DataURLEntity
   */
  protected $urlEntity;

  /**
   * @return DataURLEntityInterface
   */
  public function getURLEntity ()
  {
    return $this->urlEntity;
  }
  /**
   * @param DataURLEntityInterface $entity
   * @return $this
   */
  public function setURLEntity(DataURLEntityInterface $entity)
  {
    $this->urlEntity = $entity;
    return $this;
  }
}