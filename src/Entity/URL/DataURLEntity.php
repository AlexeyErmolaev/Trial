<?php
namespace Armor\Trial\Entity\URL;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;

/**
 * @Entity
 * @Table(name="data_url")
 */
class DataURLEntity implements DataURLEntityInterface {
  use DataBasicTrait;
  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   */
  protected $data_id;
  /**
   * @url @Column(type="string", length=255)
   * @var string
   */
  protected $url = '';

  /**
   * @return string
   */
  public function getURL() {
    return $this->url;
  }

  /**
   * @param $url string
   * @return DataURLEntityInterface
   */
  public function setURL($url) {
    $this->url = $url;
    return $this;
  }
}