<?php
namespace Armor\Trial\Models\AccessExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntity;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;
use Armor\Trial\Entity\AccessExclusiveFileEntity\ExclusiveFileEntity;
use Armor\Trial\Entity\Author\DataAuthorEntity;
use Armor\Trial\Entity\DataBasic\DataBasicEntity;
use Armor\Trial\Entity\GuideRequest\DataFileNameEntity;

class AccessExclusiveFileEntityFactory implements AccessExclusiveFileEntityFactoryInterface {
  protected $author = null;
  protected $basic;
  public function __construct($author = null, $ip = null, $userAgent = null) {

    $this->basic = new DataBasicEntity();
    if ($ip === null) {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    if ($userAgent === null) {
      $userAgent = $_SERVER['HTTP_USER_AGENT'];
    }
    $this->basic
      ->setStatus(0)
      ->setCreatedAt(new \DateTime())
      ->setIp(ip2long($ip))
      ->setUserAgent($userAgent);
    if ($author !== null) {
      $this->author = new DataAuthorEntity($author);
      $this->author->setDataBasicEntity($this->basic);
    }

  }

  /**
   * @param $customer
   * @param $filename
   * @return AccessExclusiveFileEntityInterface
   */
  public function create($customer, $filename) {
    $entity = new AccessExclusiveFileEntity();
    $customerEntity = new ExclusiveFileEntity();
    $customerEntity
      ->setDataBasicEntity($this->basic)
      ->setCustomer($customer);

    $fileEntity = new DataFileNameEntity();
    $fileEntity
      ->setDataBasicEntity($this->basic)
      ->setFileName($filename);
    $entity
      ->setDataBasicEntity($this->basic)
      ->setExclusiveFileEntity($customerEntity);
    if ($filename !== null) {
      $entity->setFileNameEntity($fileEntity);
    }
    if ($this->author !== null) {
      $entity->setAuthorEntity($this->author);
    }
    return $entity;
  }
}