<?php
namespace Armor\Trial\Entity\CheckByServer;
trait CheckByServerTrait {
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\CheckByServer\CheckByServerEntity", cascade={"persist"})
   * @JoinColumn(name="data_id", referencedColumnName="data_id")
   * @var CheckByServerEntityInterface.
   */
  protected $checkEntityByServer;
  /**
   * @return CheckByServerEntityInterface
   */
  public function getCheckEntity () {
    return $this->checkEntityByServer;
  }
  /**
   * @param CheckByServerEntityInterface $entity
   * @return $this
   */
  public function setCheckEntity(CheckByServerEntityInterface $entity) {
    $this->checkEntityByServer = $entity;
    return $this;
  }
}