<?php
namespace Armor\Trial\Entity\CheckByServer;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;

/**
 * @Entity
 * @Table(name="data_license_check_by_server")
 */
class CheckByServerEntity implements CheckByServerEntityInterface {
  use DataBasicTrait;
  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   * @var int
   */
  public $data_id;
  /**
   * @has_checking_database @Column(type="integer")
   * @var int
   */
  protected $has_checking_database;
  /**
   * @has_checking_host @Column(type="integer")
   * @var int
   */
  protected $has_checking_host;
  /**
   * @has_checking_port @Column(type="integer")
   * @var int
   */
  protected $has_checking_port;

  /**
   * @has_checking_cluster @Column(type="integer")
   * @var int
   */
  protected $has_checking_cluster;

  /**
   * @return bool
   */
  public function getDatabase() {
    return (bool) $this->has_checking_database;
  }

  /**
   * @return bool
   */
  public function getHost() {
    return (bool) $this->has_checking_host;
  }

  /**
   * @return bool
   */
  public function getPort() {
    return (bool) $this->has_checking_port;
  }

  /**
   * @return bool
   */
  public function getCluster() {
    return (bool) $this->has_checking_cluster;
  }

  /**
   * @param $bool bool
   * @return $this
   */
  public function setDatabase($bool) {
    $this->has_checking_database = (bool) $bool;
    return $this;
  }

  /**
   * @param $bool bool
   * @return $this
   */
  public function setHost($bool) {
    $this->has_checking_host = (bool) $bool;
    return $this;
  }

  /**
   * @param $bool bool
   * @return $this
   */
  public function setPort($bool) {
    $this->has_checking_port = (bool) $bool;
    return $this;
  }

  /**
   * @param $bool bool
   * @return $this
   */
  public function setCluster($bool) {
    $this->has_checking_cluster = (bool) $bool;
    return $this;
  }
}