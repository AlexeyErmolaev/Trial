<?php
namespace Armor\Trial\Entity\Download;
use Armor\Trial\Entity\Author\DataAuthorTrait;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;
use Armor\Trial\Entity\CheckByServer\CheckByServerTrait;
use Armor\Trial\Entity\DataHostLocation\DataHostLocationTrait;
use Armor\Trial\Entity\DataLicenseDatabase\DataLicenseDatabaseEntity;
use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
use Armor\Trial\Entity\DataUser\DataUserTrait;
use Armor\Trial\Entity\DataUser\GetSetDataUserEntityInterface;
use Armor\Trial\Entity\Features\DataFeatureEntity;
use Armor\Trial\Entity\HasNewVersion\DataHasNewVersionTrait;
use Armor\Trial\Entity\License\DataLicenseEntityTrait;
use Armor\Trial\Entity\License\GetSetDataLicenseEntity;
use Armor\Trial\Entity\Product\GetSetProductEntityInterface;
use Armor\Trial\Entity\Product\ProductTrait;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

/**
 * @Entity
 * @Table(name="data_type")
 */
class LicenseGeneratedEntity
  implements
    DataTypeEntityInterface,
    GetSetDataUserEntityInterface,
    GetSetProductEntityInterface,
    GetSetDataLicenseEntity,
    JsonSerializable {
  use DataUserTrait;
  use ProductTrait;
  use DataLicenseEntityTrait;
  use DataTypeEntityTrait;
  use DataAuthorTrait;
  use DataHasNewVersionTrait;
  use DataHostLocationTrait;
  use CheckByServerTrait;
  use DataBasicTrait;


  /**
   * One License has Many Features.
   * @OneToMany(targetEntity="Armor\Trial\Entity\Features\DataFeatureEntity", mappedBy="license", cascade={"persist"})
   */
  protected $features;
  /**
   * One License has Many Features.
   * @OneToMany(targetEntity="Armor\Trial\Entity\DataLicenseDatabase\DataLicenseDatabaseEntity", mappedBy="license", cascade={"persist"})
   */
  protected $databases;
  const TYPE = self::TYPE_GENERATE_LICENSE;

  public function __construct ()
  {
    $this->setType(self::TYPE);
    $this->features = new ArrayCollection();
    $this->databases = new ArrayCollection();
  }
  public function getFeatures(){
    return $this->features;
  }
  public function getDatabases(){
    return $this->databases;
  }

  /**
   * Specify data which should be serialized to JSON
   * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by <b>json_encode</b>,
   * which is a value of any type other than a resource.
   * @since 5.4.0
   */
  function jsonSerialize() {

    $duration = $this->getLicenseEntity()->getDuration()->getTimestamp();

    switch ($this->getLicenseEntity()->getLicenseType()) {
      case 1:
        $licenseType = "Trial";
        break;
      case 2:
        $licenseType = "TERM";
        break;
      case 3:
        $licenseType = "Permanent";
        $duration = "";
        break;
      default:
        $licenseType = "";
        break;
    }
    $hasNewVersion = false;
    $localhost = '';
    $author = '';
    $features = [];
    $databases = [];
    $check = [
      "db"=>false,
      "host"=>false,
      "post"=>false,
      "cluster"=>false,
    ];
    try {
      $author = $this->getAuthorEntity()->getAuthor();
    } catch (\Exception $e) {}
    try {
      $hasNewVersion = (bool) $this->getHasNewVersionEntity()->hasNewVersion();
    } catch (\Exception $e) {}
    try {
      $localhost = $this->getHostLocation()->getLocalhost();
    } catch (\Exception $e) {}
    try {
      $check = [
        "db"=>$this->getCheckEntity()->getDatabase(),
        "host"=>$this->getCheckEntity()->getHost(),
        "post"=>$this->getCheckEntity()->getPort(),
        "cluster"=>$this->getCheckEntity()->getCluster(),
      ];
    } catch (\Exception $e) {}
    try {
      foreach ($this->features->getValues() as $entity) {
        /**
         * @type $entity DataFeatureEntity
         */
        $features[] = $entity->getFeatureName();
      }
    } catch (\Exception $e) {}
    try {
      foreach ($this->databases->getValues() as $entity) {
        /**
         * @type $entity DataLicenseDatabaseEntity
         */
        $databases[] = [
          "name"=>$entity->getName(),
          "host"=>$entity->getHost(),
          "port"=>$entity->getPort(),
          "cluster"=>$entity->hasCluster(),
        ];
      }
    } catch (\Exception $e) {}
    // 1505197777
    return [
      "created"=>$this->getDataBasicEntity()->getCreatedAt()->getTimestamp(),
      "id"=>$this->getDataBasicEntity()->getId(),
      "customer"=>$this->getDataUserEntity()->getUserEmail(),
      "data_start"=>$this->getDataBasicEntity()->getCreatedAt()->getTimestamp(),
      "data_finish"=>$duration,
      "type"=>$licenseType,
      // "operation_system"=>$this->getProductEntity()->getOperatingSystem(),
      "operation_system"=>"",
      "os"=>explode('|', $this->getProductEntity()->getOperatingSystem()),
      "code"=>$this->getLicenseEntity()->getKeyActivation(),
      "author"=> $author,
      "version"=> $hasNewVersion,
      "localhost"=>$localhost,
      "features"=>$features,
      "databases"=>$databases,
      "check"=>$check
    ];
  }
}