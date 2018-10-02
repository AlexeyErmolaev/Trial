<?php
namespace Armor\Trial\Entity\AccessExclusiveFileEntity;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;
interface
  ExclusiveFileEntityInterface
extends
  GetDataBasicEntityInterface,
  SetDataBasicEntityInterface {
  /**
   * @return number
   */
  public function getDataId();
  /**
   * @return string
   */
  public function getCustomer();
  /**
   * @param $customer string
   * @return $this
   */
  public function setCustomer($customer);

}