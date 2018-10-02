<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;

use Armor\Trial\Entity\DataBasic\DataBasicEntity;
use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
use Armor\Trial\Entity\DataUser\DataUserEntity;
use Armor\Trial\Entity\DownloadExclusiveFile\DownloadExclusiveFileEntity;
use Armor\Trial\Entity\DownloadExclusiveFile\DownloadExclusiveFileEntityInterface;
use Armor\Trial\Entity\GuideRequest\DataFileNameEntity;
use Armor\Trial\Entity\Result\DataResultEntity;
use Armor\Trial\Entity\URL\DataURLEntity;

class DownloadExclusiveFileEntityFactory implements DownloadExclusiveFileEntityFactoryInterface {
  /**
   * @var DataBasicEntityInterface
   */
  protected $basicEntity;

  public function __construct($ip, $userAgent) {
    $basicEntity = new DataBasicEntity();
    $basicEntity
      ->setIp(ip2long($ip))
      ->setUserAgent($userAgent)
      ->setCreatedAt(new \DateTime())
      ->setStatus(0);
    $this->basicEntity = $basicEntity;
  }


  /**
   * @param $customer
   * @param $name
   * @param $url
   * @param $result
   * @param $filename
   * @return DownloadExclusiveFileEntityInterface
   */
  public function create($customer, $name, $url, $result, $filename) {
    $downloadEntity = new DownloadExclusiveFileEntity();
    $userEntity = new DataUserEntity();
    $userEntity
      ->setDataBasicEntity($this->basicEntity)
      ->setUserEmail($customer)
      ->setUserName($name);

    $urlEntity = new DataURLEntity();
    $urlEntity->setDataBasicEntity($this->basicEntity);
    $urlEntity->setURL($url);

    $resultEntity = new DataResultEntity();
    $resultEntity
      ->setDataBasicEntity($this->basicEntity)
      ->setType('exclusive_file')
      ->setValue($result);

    $downloadEntity
      ->setDataBasicEntity($this->basicEntity)
      ->setDataUserEntity($userEntity)
      ->setURLEntity($urlEntity);

    if ($filename !== null) {
      $fileNameEntity = new DataFileNameEntity();
      $fileNameEntity
        ->setDataBasicEntity($this->basicEntity)
        ->setFileName($filename);
      $downloadEntity
        ->setFileNameEntity($fileNameEntity);
    }

    $downloadEntity->getResults()->add($resultEntity);
    return $downloadEntity;
  }
}