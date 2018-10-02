<?php
namespace Armor\Trial\Entity\URL;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;
interface DataURLEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface {
  /**
   * @return string
   */
  public function getURL();

  /**
   * @param $url string
   * @return DataURLEntityInterface
   */
  public function setURL($url);
}