<?php
namespace Armor\Trial\Models\AccessExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;

interface AccessExclusiveFileModelInterface {
  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @return bool
   */
  public function save(AccessExclusiveFileEntityInterface $entity);
  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @return bool
   */
  public function remove(AccessExclusiveFileEntityInterface $entity);
  /**
   * @param $customer
   * @param $filename
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getConcreteEntities ($customer, $filename);
  /**
   * @param $code
   * @param $customer
   * @param $os
   * @return AccessExclusiveFileEntityInterface
   */
  public function getReleasedEntity ($code, $customer, $os);
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getReleasedEntities ();
  /**
   * @param $customer
   * @param $code
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getCustomerFiles ($customer, $code);

  /**
   * @param $ID int
   * @return AccessExclusiveFileEntityInterface
   */
  public function getFileByID ($ID);
  /**
   * @param $dir string
   * @param $customer string
   * @param $code string
   * @param $os string
   * @return AccessExclusiveFileEntityInterface
   */
  public function getLatestEntity ($dir, $customer, $code, $os);
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getLatestEntities ();
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getEntities ();
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getEntitiesWithFile ();
  public static function getCode(AccessExclusiveFileEntityInterface $entity);

  /**
   * @param $customer
   * @param $file string
   * @param $code string
   * @param $name string
   * @return AccessExclusiveFileEntityInterface
   */
  public function getAccessibleEntity (
    $customer,
    $file,
    $code,
    $name
  );
}