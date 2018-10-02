<?php
namespace Armor\Trial\Entity\AccessExclusiveFileEntity;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;

/**
 * @Entity
 * @Table(name="access_to_exclusive_files")
 */
class ExclusiveFileEntity implements ExclusiveFileEntityInterface {
  use DataBasicTrait;
  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   * @var int
   */
  protected $data_id;
  /**
   * @customer @Column(type="string", length=255)
   * @var string
   */
  protected $customer;
  /**
   * @return number
   */
  public function getDataId() {
    return $this->data_id;
  }

  /**
   * @return string
   */
  public function getCustomer() {
    return $this->customer;
  }


  /**
   * @param $customer string
   * @return $this
   */
  public function setCustomer($customer) {
    $this->customer = $customer;
    return $this;
  }

}