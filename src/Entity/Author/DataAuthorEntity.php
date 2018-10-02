<?php
namespace Armor\Trial\Entity\Author;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;
/**
 * @Entity
 * @Table(name="data_author")
 */
class DataAuthorEntity implements DataAuthorEntityInterface {

  use DataBasicTrait;
  /**
   * @Id
   * @Column(name="data_id", type="integer", nullable=false)
   * @GeneratedValue()
   * @var int
   */
  protected $data_id;
  /**
   * @author_name @Column(type="string", length=255)
   * @var string
   */
  protected $author_name;

  /**
   * DataAuthorEntity constructor.
   * @param string $author_name
   */
  public function __construct($author_name = null) {
    if ($author_name !== null) {
      $this->author_name = $author_name;
    }
  }
  public function getAuthor() {
    return $this->author_name;
  }
  public function setAuthor($author) {
    $this->author_name = $author;
  }
}