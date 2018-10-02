<?php
namespace Armor\Trial\Entity\DataLicenseDatabase;

interface DataLicenseDatabaseEntityInterface {
  public function getId();
  public function getLicenseId();
  public function getDatabaseId();
  public function getHost();
  public function getPort();
  public function hasCluster();
  public function setId($id);
  public function setLicenseId($id);
  public function setDatabaseId($id);
  public function setHost($host);
  public function setPort($port);
  public function setCluster($bool);
}