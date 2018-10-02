<?php
namespace Armor\Trial\Entity\DataHostLocation;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;

/**
 * @Entity
 * @Table(name="data_host_location")
 */
class DataHostLocationEntity implements DataHostLocationEntityInterface {
  use DataBasicTrait;
  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   * @var int
   */
  protected $data_id;
  /**
   * @host_location @Column(type="string", length=255)
   * @var string
   */
  protected $host_location;

  public function getLocalhost() {
    return $this->host_location;
  }

  public function setLocalhost($host) {
    $this->host_location = $host;
  }
}