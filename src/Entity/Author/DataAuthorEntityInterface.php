<?php
namespace Armor\Trial\Entity\Author;

use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;

interface DataAuthorEntityInterface extends GetDataBasicEntityInterface{
  public function getAuthor();
  public function setAuthor($author);
}