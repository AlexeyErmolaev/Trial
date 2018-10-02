<?php
namespace Armor\Trial\Entity\Features;

use Armor\Trial\Entity\DataBasic\DataBasicEntity;
use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

/**
 * @Entity
 * @Table(name="data_features")
 */
class DataFeatureEntity implements DataFeatureEntityInterface, GetDataBasicEntityInterface, SetDataBasicEntityInterface {
  const AUDIT = 1;
  const SECURITY = 2;
  const DYNAMIC_MASKING = 3;
  const STATIC_MASKING = 4;
  const SEARCH_DATA = 5;
  const PERFORMANCE_MONITORING = 6;

  /**
   * @Id
   * @Column(name="id", type="integer")
   * @GeneratedValue(strategy="AUTO")
   * @var int
   */
  public $id;
  /**
   * Many Features have One License.
   * @ManyToOne(targetEntity="Armor\Trial\Entity\Download\LicenseGeneratedEntity", inversedBy="features", cascade={"persist"})
   * @JoinColumn(name="license_id", referencedColumnName="data_id")
   */
  public $license;
  /**
   * @feature_id @Column(type="integer")
   * @var string
   */
  protected $feature_id;
  /**
   * @license_id @Column(type="integer")
   * @var string
   */
  protected $license_id;

  /**
   * DataFeatureEntity constructor.
   * @param DataBasicEntityInterface $data_basic
   */
  public function __construct(DataBasicEntityInterface $data_basic) {
    $this->data_basic = $data_basic;
  }

  public function getFeatureId() {
    return $this->feature_id;
  }
  public function getFeatureLabel() {
    switch ($this->feature_id) {
      case self::AUDIT:
        return 'Audit';
      case self::SECURITY:
        return 'Security';
      case self::DYNAMIC_MASKING:
        return 'Dynamic Masking';
      case self::STATIC_MASKING:
        return 'Static Masking';
      case self::SEARCH_DATA:
        return 'Search Data';
      case self::PERFORMANCE_MONITORING:
        return 'Performance Monitor';
      default:
        throw new \Exception('Feature not found');
    }
  }
  public function getFeatureName() {
    switch ($this->feature_id) {
      case self::AUDIT:
        return 'Audit';
      case self::SECURITY:
        return 'Security';
      case self::DYNAMIC_MASKING:
        return 'DynamicMasking';
      case self::STATIC_MASKING:
        return 'StaticMasking';
      case self::SEARCH_DATA:
        return 'SearchData';
      case self::PERFORMANCE_MONITORING:
        return 'PerformanceMonitor';
      default:
        throw new \Exception('Feature not found');
    }
  }
  public function setFeatureAsString($feature) {
    switch (strtoupper($feature)) {
      case 'AUDIT':
        $this->feature_id = self::AUDIT;
        break;
      case 'SECURITY':
        $this->feature_id = self::SECURITY;
        break;
      case 'DYNAMIC MASKING':
        $this->feature_id = self::DYNAMIC_MASKING;
        break;
      case 'DYNAMICMASKING':
        $this->feature_id = self::DYNAMIC_MASKING;
        break;
      case 'STATIC MASKING':
        $this->feature_id = self::STATIC_MASKING;
        break;
      case 'STATICMASKING':
        $this->feature_id = self::STATIC_MASKING;
        break;
      case 'SEARCH DATA':
        $this->feature_id = self::SEARCH_DATA;
        break;
      case 'SEARCHDATA':
        $this->feature_id = self::SEARCH_DATA;
        break;
      case 'PERFORMANCE MONITORING':
        $this->feature_id = self::PERFORMANCE_MONITORING;
        break;
      case 'PERFORMANCE MONITOR':
        $this->feature_id = self::PERFORMANCE_MONITORING;
        break;
      case 'PERFORMANCEMONITORING':
        $this->feature_id = self::PERFORMANCE_MONITORING;
        break;
      case 'PERFORMANCEMONITOR':
        $this->feature_id = self::PERFORMANCE_MONITORING;
        break;
      default:
        throw new \Exception("Feature not found: {$feature}");
    }
  }
  public function setFeatureId($id) {
    $this->feature_id = $id;
  }
  public function getLicenseId() {
    return $this->license_id;
  }
  public function setLicenseId($id) {
    $this->license_id = $id;
  }
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\DataBasic\DataBasicEntity", cascade={"persist", "remove"})
   * @JoinColumn(name="license_id", referencedColumnName="id")
   * @var DataBasicEntity
   */
  protected $data_basic;
  /**
   * @return DataBasicEntityInterface
   */
  public function getDataBasicEntity ()
  {
    return $this->data_basic;
  }

  /**
   * @param DataBasicEntityInterface $basicEntityInterface
   * @return $this
   */
  public function setDataBasicEntity(DataBasicEntityInterface $basicEntityInterface)
  {
    $this->data_basic = $basicEntityInterface;
    return $this;
  }
}