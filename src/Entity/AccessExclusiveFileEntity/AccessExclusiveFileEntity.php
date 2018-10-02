<?php
namespace Armor\Trial\Entity\AccessExclusiveFileEntity;

use Armor\Trial\Entity\Author\DataAuthorTrait;
use Armor\Trial\Entity\DataBasic\DataBasicInfoTrait;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;
use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
use Armor\Trial\Entity\GuideRequest\DataFileNameTrait;
use Armor\Trial\Models\AccessExclusiveFileModel\AccessExclusiveFileModel;
use JsonSerializable;

/**
 * @Entity
 * @Table(name="data_type")
 */
class AccessExclusiveFileEntity implements AccessExclusiveFileEntityInterface, JsonSerializable {
  use DataTypeEntityTrait;
  use AccessExclusiveFileEntityTrait;
  use DataAuthorTrait;
  use DataBasicInfoTrait;
  use DataFileNameTrait;
  use DataBasicTrait;
  /**
   * AccessExclusiveFileModel constructor.
   */
  public function __construct() {
    $this->setType(self::TYPE_ACCESS_TO_EXCLUSIVE_FILE);
  }

  /**
   * Specify data which should be serialized to JSON
   * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by <b>json_encode</b>,
   * which is a value of any type other than a resource.
   * @since 5.4.0
   */
  function jsonSerialize() {
    try {
      $filename = $this->getFileNameEntity()->getFileName();
    } catch (\Exception $e) {
      $filename = null;
    }
    $json = array(
      "id"=>$this->getDataBasicEntity()->getId(),
      "version"=>3,
      "type"=>$this->getType(),
      "author"=>$this->getAuthorEntity()->getAuthor(),
      "customer"=>$this->getExclusiveFileEntity()->getCustomer(),
      "filename"=>$filename,
      "code"=> AccessExclusiveFileModel::getCode($this)
    );
    return $json;
  }
}
