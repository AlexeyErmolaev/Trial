<?php
namespace Armor\Trial\Entity\Features;

/**
 * @Entity
 * @Table(name="data_list_features")
 */
class DataFeatureListEntity {
  /**
   * @Id
   * @Column(name="feature_id", type="integer")
   * @GeneratedValue(strategy="AUTO")
   * @var int
   */
  protected $feature_id;
  /**
   * @feature_name @Column(type="string")
   * @var string
   */
  protected $feature_name;

  /**
   * @feature_label @Column(type="string")
   * @var string
   */
  protected $feature_label;

  public function getName() {
    return $this->feature_name;
  }
  public function getLabel() {
    return $this->feature_label;
  }
}