<?php
namespace Armor\Trial\Entity\DownloadExclusiveFile;
use Armor\Trial\Entity\DataBasic\DataBasicInfoTrait;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;
use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
use Armor\Trial\Entity\DataUser\DataUserTrait;
use Armor\Trial\Entity\GuideRequest\DataFileNameTrait;
use Armor\Trial\Entity\Result\DataResultEntityInterface;
use Armor\Trial\Entity\URL\DataURLTrait;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

/**
 * @Entity
 * @Table(name="data_type")
 */
class DownloadExclusiveFileEntity implements DownloadExclusiveFileEntityInterface, JsonSerializable {
  use DataUserTrait;
  use DataBasicInfoTrait;
  use DataURLTrait;
  use DataTypeEntityTrait;
  use DataFileNameTrait;
  use DataBasicTrait;
  /**
   * @OneToMany(targetEntity="Armor\Trial\Entity\Result\DataResultEntity", mappedBy="downloadExclusiveFile", cascade={"persist"})
   */
  protected $resultEntities;

  public function __construct() {
    $this->setType(self::TYPE_DOWNLOAD_EXCLUSIVE_FILE);
    $this->resultEntities = new ArrayCollection();
  }
  /**
   * @return ArrayCollection<DataResultEntityInterface>
   */
  public function getResults () {
    return $this->resultEntities;
  }
  /**
   * @param $type string
   * @return DataResultEntityInterface
   */
  public function getResult($type) {
    /**
     * @var $resultEntities DataResultEntityInterface[]
     */
    $resultEntities = $this->getResults()->getValues();
    for ($i = 0; $i < count($resultEntities); $i++) {
      if ($resultEntities[$i]->getType() === $type) {
        return $resultEntities[$i];
      }
    }
    return null;
  }

  public function jsonSerialize() {
    $result = false;
    $resultEntity = $this->getResult(DataResultEntityInterface::RESULT_TYPE_EXCLUSIVE_FILE);
    if ($resultEntity !== null) {
      $result = $resultEntity->getValue();
    }
    try {
      $filename = $this->getFileNameEntity()->getFileName();
    } catch (\Exception $e) {
      $filename = null;
    }
    $json = array(
      "id"=>$this->getDataBasicEntity()->getId(),
      "version"=>3,
      "type"=>self::TYPE_DOWNLOAD_EXCLUSIVE_FILE,
      "user_info"=>array(
        "created"=>$this->getDataBasicEntity()->getCreatedAt(),
        "ip"=>long2ip(intval($this->getDataBasicEntity()->getIp())),
        "browser"=>$this->getBrowser($this->getDataBasicEntity()),
        "operation_system"=>$this->getOS($this->getDataBasicEntity())
      ),
      "user_data"=>array(
        "email"=>$this->getDataUserEntity()->getUserEmail(),
        "name"=>$this->getDataUserEntity()->getUserName(),
        "userAgent"=>$this->getDataBasicEntity()->getUserAgent()
      ),
      "filename"=>$filename,
      "url" => $this->getURLEntity()->getURL(),
      "result" => $result
    );
    return $json;
  }
}