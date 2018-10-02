<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;

interface DownloadExclusiveFileModelFacadeInterface {
  /**
   * @param $os string
   * @param $code string
   * @param $customer string
   * @return bool
   */
  public function latest ($os, $code, $customer);
  /**
   * @param $os string
   * @param $code string
   * @param $customer string
   * @param $type int
   * @return bool
   */
  public function released ($os, $code, $customer, $type);
  /**
   * @param $code
   * @param $customer
   * @param $filename
   * @return bool
   */
  public function concrete ($code, $customer, $filename);

  /**
   * @param $id int
   * @return bool
   */
  public function remove ($id);

  /**
   * @param $filename string
   * @param $customer string
   * @return bool
   */
  public function create ($filename, $customer);

  public function addToLog ($customer, $url, $success);
  public function download();

  /**
   * @return AccessExclusiveFileEntityInterface
   */
  public function getFile ();
}