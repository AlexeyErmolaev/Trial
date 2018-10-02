<?php
namespace Armor\Trial\Entity\HasNewVersion;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;

/**
 * @Entity
 * @Table(name="data_license_has_new_version")
 */
class HasNewVersionEntity implements HasNewVersionEntityInterface {
  use DataBasicTrait;
  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   * @var int
   */
  protected $data_id;
  /**
   * @has_new_version @Column(type="string", length=255)
   * @var string
   */
  protected $has_new_version;
  public function hasNewVersion() {
    return $this->has_new_version;
  }
  public function setHavingNewVersion($bool) {
    $this->has_new_version = (int) $bool;
  }
}