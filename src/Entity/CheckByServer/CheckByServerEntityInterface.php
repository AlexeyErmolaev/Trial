<?php
namespace Armor\Trial\Entity\CheckByServer;

interface CheckByServerEntityInterface {
  /**
   * @return bool
   */
  public function getDatabase();
  /**
   * @return bool
   */
  public function getHost();
  /**
   * @return bool
   */
  public function getPort();
  /**
   * @return bool
   */
  public function getCluster();

  /**
   * @param $bool bool
   * @return $this
   */
  public function setDatabase($bool);
  /**
   * @param $bool bool
   * @return $this
   */
  public function setHost($bool);
  /**
   * @param $bool bool
   * @return $this
   */
  public function setPort($bool);
  /**
   * @param $bool bool
   * @return $this
   */
  public function setCluster($bool);
}