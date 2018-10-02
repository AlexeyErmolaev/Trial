<?php
namespace Armor\Trial\Entity\OperationSystem;
use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;

/**
 * @Entity
 * @Table(name="data_operation_system")
 */
class OperationSystemEntity implements OperationSystemEntityInterface {
  const OS_LINUX = 'OS_LINUX';
  const OS_WINDOWS = 'OS_WINDOWS';
  const OS_SOLARIS = 'OS_SOLARIS';
  const OS_HPUX = 'OS_HPUX';
  const OS_TRU64 = 'OS_TRU64';
  const OS_AIX = 'OS_AIX';

  use DataBasicTrait;

  /**
   * @Id
   * @Column(name="id", type="integer")
   * @GeneratedValue(strategy="AUTO")
   * @var int
   */
  public $id;

  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   */
  protected $data_id;

  /**
   * @operating_system @Column(type="string", length=50)
   * @var string
   */
  protected $operating_system;
  /**
   * @param DataBasicEntityInterface $basicEntity
   */
  public function __construct(DataBasicEntityInterface $basicEntity) {
    $this->data_basic = $basicEntity;
  }

  public function getName() {
    return $this->operating_system;
  }

  public function setName($os) {
    $this->operating_system = $os;
  }
}