<?php
namespace Armor\Trial\Entity\OperationSystem;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

interface OperationSystemEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface{
  public function getName();
  public function setName($os);
}