<?php
namespace Armor\Trial\Entity\Result;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

interface DataResultEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface {
  /**
   * @return int
   */
  public function getId ();

  /**
   * @return string
   */
  public function getType ();

  /**
   * @return boolean
   */
  public function getValue ();
  /**
   * @param $id int
   * @return DataResultEntityInterface
   */
  public function setId ($id);
  /**
   * @param $type string
   * @return DataResultEntityInterface
   */
  public function setType ($type);
  /**
   * @param $value boolean
   * @return DataResultEntityInterface
   */
  public function setValue ($value);
  const RESULT_TYPE_EXCLUSIVE_FILE = 'exclusive_file';
}