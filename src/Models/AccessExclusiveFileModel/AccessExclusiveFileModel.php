<?php
namespace Armor\Trial\Models\AccessExclusiveFileModel;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntity;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntityInterface;
use Armor\Trial\Entity\AccessExclusiveFileEntity\ExclusiveFileEntity;
use Armor\Trial\Entity\GuideRequest\DataFileNameEntity;
use Doctrine\ORM\EntityManager;
use GothicPrince\Download\Models\ActualVersionOfFile;

class AccessExclusiveFileModel implements AccessExclusiveFileModelInterface {
  protected $em;
  public function __construct(EntityManager $em) {
    $this->em = $em;
  }
  /**
   * @return EntityManager
   */
  protected function getEntityManager () {
    return $this->em;
  }
  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @return bool
   */
  public function save(AccessExclusiveFileEntityInterface $entity) {
    $this->getEntityManager()->persist($entity);
    $this->getEntityManager()->flush();
    return $entity->getDataBasicEntity()->getId() > 0;
  }

  /**
   * @param AccessExclusiveFileEntityInterface $entity
   * @return bool
   */
  public function remove(AccessExclusiveFileEntityInterface $entity) {
    $id = $entity->getDataBasicEntity()->getId();
    $this->getEntityManager()->remove($entity);
    $this->getEntityManager()->flush();
    return $this->getEntityManager()->find(AccessExclusiveFileEntity::class, $id) === null;
  }
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getEntities () {
    return $this->getEntityManager()
      ->getRepository(AccessExclusiveFileEntity::class)->findBy([
        'type'=>AccessExclusiveFileEntity::TYPE_ACCESS_TO_EXCLUSIVE_FILE
      ], ['data_id'=>'DESC']);
  }
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getLatestEntities () {
    $builder = $this->getEntityManager()
      ->getRepository(AccessExclusiveFileEntity::class)
      ->createQueryBuilder('T')
      ->from(ExclusiveFileEntity::class, 'C')
      ->from(DataFileNameEntity::class, 'F')
      //->where('f.customer = :customer')
      ->where('C.data_id = T.data_id')
      ->andWhere('T.type = ' . AccessExclusiveFileEntity::TYPE_ACCESS_TO_EXCLUSIVE_FILE)
      ->andWhere('F.data_id = T.data_id')
      ->orderBy('C.data_id', 'DESC')
      ->groupBy('C.customer');
    $query = $builder->getQuery();
    // echo $query->getSQL();
    return $query->getResult();
  }
  /**
   * @param $customer
   * @param $filename
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getConcreteEntities ($customer, $filename) {
    $builder = $this->getEntityManager()
      ->getRepository(AccessExclusiveFileEntity::class)
      ->createQueryBuilder('T')
      ->from(ExclusiveFileEntity::class, 'C')
      ->where('C.customer = :customer')
      ->andWhere('T.type = ' . AccessExclusiveFileEntity::TYPE_ACCESS_TO_EXCLUSIVE_FILE)
      ->andWhere('C.data_id = T.data_id')
      ->setParameter('customer', $customer);
    if ($filename !== null) {
      $builder
        ->from(DataFileNameEntity::class, 'F')
        ->setParameter('filename', $filename)
        ->andWhere('F.data_id = T.data_id')
        ->andWhere('F.filename = :filename');
    }
    $builder->orderBy('C.data_id', 'DESC');
    $query = $builder->getQuery();
    return $query->getResult();
  }
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getEntitiesWithFile () {
    $builder = $this->getEntityManager()
      ->getRepository(AccessExclusiveFileEntity::class)
      ->createQueryBuilder('T')
      ->from(ExclusiveFileEntity::class, 'C')
      ->from(DataFileNameEntity::class, 'F')
      ->where('C.data_id = T.data_id')
      ->andWhere('T.type = ' . AccessExclusiveFileEntity::TYPE_ACCESS_TO_EXCLUSIVE_FILE)
      ->andWhere('F.data_id = T.data_id')
      ->orderBy('C.data_id', 'DESC');
    $query = $builder->getQuery();
    return $query->getResult();
  }
  /**
   * @param $code
   * @param $customer
   * @param $os
   * @return AccessExclusiveFileEntityInterface
   */
  public function getReleasedEntity ($code, $customer, $os) {
    $entities = $this->getConcreteEntities($customer, null);
    $factory = new AccessExclusiveFileEntityFactory();
    foreach ($entities as $entity) {
      $mockEntity = $factory->create($customer, '');
      $mockEntity->getDataBasicEntity()->setId($entity->getDataBasicEntity()->getId());
      if ($this::getCode($mockEntity) === $code) {
        return $mockEntity;
      }
    }
    return null;
  }
  /**
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getReleasedEntities () {
    $builder = $this->getEntityManager()
      ->getRepository(AccessExclusiveFileEntity::class)
      ->createQueryBuilder('T')
      ->from(ExclusiveFileEntity::class, 'C')
      //->where('f.customer = :customer')
      ->where('C.data_id = T.data_id')
      ->andWhere('T.type = ' . AccessExclusiveFileEntity::TYPE_ACCESS_TO_EXCLUSIVE_FILE)
      ->orderBy('C.data_id', 'DESC')
      ->groupBy('C.customer');
    $query = $builder->getQuery();
    return $query->getResult();
  }
  public static function getCode(AccessExclusiveFileEntityInterface $entity) {
    $id = $entity->getDataBasicEntity()->getId();
    $time = '';
    try {
      $filename = $entity->getFileNameEntity()->getFileName();
    } catch (\Exception $e) {
      $filename = '';
    }
    $customer = $entity->getExclusiveFileEntity()->getCustomer();
    return md5(md5($time . $id) . $filename . $customer) . AccessExclusiveFileEntity::TYPE_ACCESS_TO_EXCLUSIVE_FILE;
  }
  /**
   * @param $customer
   * @param $file string
   * @param $code string
   * @param $name string
   * @return AccessExclusiveFileEntityInterface
   */
  public function getAccessibleEntity(
    $customer,
    $file,
    $code,
    $name
  ) {
    return $this->findByCode(
      $this->getConcreteEntities($customer, $file),
      $code
    );
  }
  /**
   * @param $customer
   * @param $code
   * @return AccessExclusiveFileEntityInterface[]
   */
  public function getCustomerFiles ($customer, $code) {
    $entities = $this->getConcreteEntities($customer, null);
    if ($this->findByCode($entities, $code) === null) {
      return [];
    }
    return $entities;
  }

  /**
   * @param $dir string
   * @param $customer string
   * @param $code string
   * @param $os string
   * @return AccessExclusiveFileEntityInterface
   * @throws \Exception
   */
  public function getLatestEntity ($dir, $customer, $code, $os) {
    $model = new AccessExclusiveFileModel($this->getEntityManager());
    $entities = $model->getCustomerFiles($customer, $code);
    $actualFile = new ActualVersionOfFile($dir, $os);
    $files = [];
    foreach ($entities as $entity) {
      try {
        $files[] = $entity->getFileNameEntity()->getFileName();
      } catch (\Exception $e) {}
    }
    $file = $actualFile->GetActualVersionOfFile($actualFile->getEntities($files));
    if ($file === null) {
      throw new \Exception('Actual file not found: (' . $dir . ')');
    }
    $index = array_search($file->getFullName(), $files);
    if ($index === false) {
      throw new \Exception('It can not find exclusive file: ' . $file->getFullName());
    }
    return $entities[$index];
  }
  /**
   * @param $entities AccessExclusiveFileEntityInterface[]
   * @param $code string
   * @return AccessExclusiveFileEntityInterface
   */
  protected function findByCode ($entities, $code) {
    for ($i = 0; $i < count($entities); $i++) {
      $entity = $entities[$i];
      if ($this::getCode($entity) === $code) {
        return $entity;
      }
    }
    return null;
  }

  /**
   * @param $ID int
   * @return AccessExclusiveFileEntityInterface|null
   */
  public function getFileByID($ID) {
    return $this->getEntityManager()->find(AccessExclusiveFileEntity::class, $ID);
  }
}