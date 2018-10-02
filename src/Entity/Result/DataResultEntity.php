<?php
namespace Armor\Trial\Entity\Result;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;
use JsonSerializable;

/**
 * @Entity
 * @Table(name="data_result")
 */
class DataResultEntity implements DataResultEntityInterface, JsonSerializable {
  use DataBasicTrait;
  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   */
  protected $data_id;
  /**
   * @result_type @Column(type="string", length=255)
   * @var string
   */
  protected $result_type;
  /**
   * @result_value @Column(type="integer")
   * @var string
   */
  protected $result_value;

  /**
   * @ManyToOne(targetEntity="Armor\Trial\Entity\DownloadExclusiveFile\DownloadExclusiveFileEntity", inversedBy="resultEntities", cascade={"persist"})
   * @JoinColumn(name="data_id", referencedColumnName="data_id")
   */
  protected $downloadExclusiveFile;
  /**
   * @return int
   */
  public function getId() {
    return $this->data_id;
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->result_type;
  }

  /**
   * @return boolean
   */
  public function getValue() {
    return (boolean) $this->result_value;
  }

  /**
   * @param $id int
   * @return DataResultEntityInterface
   */
  public function setId($id) {
    $this->data_id = $id;
    return $this;
  }

  /**
   * @param $type string
   * @return DataResultEntityInterface
   */
  public function setType($type) {
    $this->result_type = $type;
    return $this;
  }

  /**
   * @param $value boolean
   * @return DataResultEntityInterface
   */
  public function setValue($value) {
    $this->result_value = $value;
    return $this;
  }

  /**
   * Specify data which should be serialized to JSON
   * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by <b>json_encode</b>,
   * which is a value of any type other than a resource.
   * @since 5.4.0
   */
  function jsonSerialize() {
    return [
      'type' => $this->getType(),
      'value' => $this->getValue()
    ];
  }
}