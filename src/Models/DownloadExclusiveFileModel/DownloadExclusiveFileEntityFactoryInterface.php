<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;
use Armor\Trial\Entity\DownloadExclusiveFile\DownloadExclusiveFileEntityInterface;

interface DownloadExclusiveFileEntityFactoryInterface {
  /**
   * @param $customer
   * @param $name
   * @param $url
   * @param $result
   * @param $filename
   * @return DownloadExclusiveFileEntityInterface
   */
  public function create($customer, $name, $url, $result, $filename);
}