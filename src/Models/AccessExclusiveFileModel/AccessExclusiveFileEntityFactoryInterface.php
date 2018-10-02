<?php
namespace Armor\Trial\Models\AccessExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;

interface AccessExclusiveFileEntityFactoryInterface {
  /**
   * @param $customer
   * @param $filename
   * @return AccessExclusiveFileEntityInterface
   */
  public function create($customer, $filename);
}