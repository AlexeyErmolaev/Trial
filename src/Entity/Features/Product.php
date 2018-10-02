<?php
namespace Armor\Trial\Entity\Features;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="test_product")
 */
class Product {
  /**
   * @Id
   * @Column(name="id", type="integer")
   * @GeneratedValue(strategy="AUTO")
   * @var int
   */
  protected $id;

  /**
   * One Product has Many Features.
   * @OneToMany(targetEntity="Armor\Trial\Entity\Features\Feature", mappedBy="product")
   */
  public $features;

  public function __construct() {
    $this->features = new ArrayCollection();
  }
}