<?php
namespace Armor\Trial\Entity\Features;

/**
 * @Entity
 * @Table(name="test_feature")
 */
class Feature {
  /**
   * @Id
   * @Column(name="id", type="integer")
   * @GeneratedValue(strategy="AUTO")
   * @var int
   */
  public $id;

  /**
   * Many Features have One Product.
   * @ManyToOne(targetEntity="Armor\Trial\Entity\Features\Product", inversedBy="features")
   * @JoinColumn(name="product_id", referencedColumnName="id")
   */
  private $product;
}