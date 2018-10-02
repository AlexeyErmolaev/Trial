<?php
namespace Armor\Trial\Entity\DataLicenseDatabase;

use Armor\Trial\Entity\DataBasic\DataBasicEntity;
use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

/**
 * @Entity
 * @Table(name="data_license_database")
 */
class DataLicenseDatabaseEntity implements DataLicenseDatabaseEntityInterface, GetDataBasicEntityInterface, SetDataBasicEntityInterface {
  const MSSQL = 1;
  const POSTGRES = 2;
  const REDSHIFT = 3;
  const AURORA = 4;
  const DB2 = 5;
  const MARIA_DB = 6;
  const GREENPLUM = 7;
  const TERADATA = 8;
  const MYSQL = 9;
  const NETEZZA = 10;
  const ORACLE = 11;
  const HIVE = 12;
  const SAP_HANA = 13;
  const VERTICA = 14;
  const MONGO_DB = 15;

  /**
   * @Id
   * @Column(name="id", type="integer")
   * @GeneratedValue(strategy="AUTO")
   * @var int
   */
  public $id;
  /**
   * Many Features have One License.
   * @ManyToOne(targetEntity="Armor\Trial\Entity\Download\LicenseGeneratedEntity", inversedBy="features", cascade={"persist"})
   * @JoinColumn(name="license_id", referencedColumnName="data_id")
   */
  public $license;
  /**
   * @database_id @Column(type="integer")
   * @var string
   */
  protected $database_id;
  /**
   * @database_host @Column(type="string")
   * @var string
   */
  protected $database_host;
  /**
   * @database_port @Column(type="integer")
   * @var string
   */
  protected $database_port;
  /**
   * @license_id @Column(type="integer")
   * @var string
   */
  protected $license_id;

  /**
   * @database_has_cluster @Column(type="integer")
   * @var int
   */
  protected $database_has_cluster;

  public function getName(){
    switch ($this->database_id) {
      case self::AURORA:
        return "Aurora";
      case self::DB2:
        return "DB2";
      case self::GREENPLUM:
        return "Greenplum";
      case self::MARIA_DB:
        return "MariaDB";
      case self::MYSQL:
        return "MySQL";
      case self::MSSQL:
        return "MSSQL";
      case self::NETEZZA:
        return "Netezza";
      case self::ORACLE:
        return "Oracle";
      case self::POSTGRES:
        return "PostgreSQL";
      case self::TERADATA:
        return "Teradata";
      case self::REDSHIFT:
        return "Redshift";
      case self::SAP_HANA:
        return "SAP HANA";
      case self::VERTICA:
        return "Vertica";
      case self::HIVE:
        return "Hive";
      case self::MONGO_DB:
        return "MongoDB";
      default:
        throw new \Exception('database_id not found');
    }
  }
  public function setName($name){
    switch ($name) {
      case "Aurora":
        return $this->database_id = self::AURORA;
      case "DB2":
        return $this->database_id = self::DB2;
      case "Greenplum":
        return $this->database_id = self::GREENPLUM;
      case "MariaDB":
        return $this->database_id = self::MARIA_DB;
      case "MySQL":
        return $this->database_id = self::MYSQL;
      case "MSSQL":
        return $this->database_id = self::MSSQL;
      case "Netezza":
        return $this->database_id = self::NETEZZA;
      case "Oracle":
        return $this->database_id = self::ORACLE;
      case "PostgreSQL":
        return $this->database_id = self::POSTGRES;
      case "Teradata":
        return $this->database_id = self::TERADATA;
      case "Redshift":
        return $this->database_id = self::REDSHIFT;
      case "SAP HANA":
        return $this->database_id = self::SAP_HANA;
      case "Vertica":
        return $this->database_id = self::VERTICA;
      case "Hive":
        return $this->database_id = self::HIVE;
      case "MongoDB":
        return $this->database_id = self::MONGO_DB;
      default:
        throw new \Exception('database_id not found');
    }
  }
  public function getLicenseId() {
    return $this->license_id;
  }
  public function setLicenseId($id) {
    $this->license_id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function getDatabaseId() {
    return $this->database_id;
  }

  public function getHost() {
    return $this->database_host;
  }

  public function getPort() {
    return $this->database_port;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setDatabaseId($id) {
    $this->database_id = $id;
  }

  public function setHost($host) {
    $this->database_host = $host;
  }

  public function setPort($port) {
    $this->database_port = $port;
  }
  public function hasCluster()
  {
    return (bool) $this->database_has_cluster;
  }
  public function setCluster($bool)
  {
    $this->database_has_cluster = $bool;
  }

  /**
   * DataFeatureEntity constructor.
   * @param DataBasicEntityInterface $data_basic
   */
  public function __construct(DataBasicEntityInterface $data_basic) {
    $this->data_basic = $data_basic;
  }
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\DataBasic\DataBasicEntity", cascade={"persist", "remove"})
   * @JoinColumn(name="license_id", referencedColumnName="id")
   * @var DataBasicEntity
   */
  protected $data_basic;
  /**
   * @return DataBasicEntityInterface
   */
  public function getDataBasicEntity ()
  {
    return $this->data_basic;
  }
  /**
   * @param DataBasicEntityInterface $basicEntityInterface
   * @return $this
   */
  public function setDataBasicEntity(DataBasicEntityInterface $basicEntityInterface)
  {
    $this->data_basic = $basicEntityInterface;
    return $this;
  }
}