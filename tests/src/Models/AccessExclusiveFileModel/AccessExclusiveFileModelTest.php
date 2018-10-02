<?php
namespace Armor\Trial\Models\AccessExclusiveFileModel;
use Armor\DoctrineConnections\models\DoctrineEntityManagerTest;
use Armor\Trial\Entity\AccessExclusiveFileEntity\AccessExclusiveFileEntity;
class AccessExclusiveFileModelTest extends DoctrineEntityManagerTest {
  public function testCreate () {
    $factory = new AccessExclusiveFileEntityFactory('admin', '127.0.0.1', 'user agent #2');
    $entity = $factory->create('Alex', 'logo.pdf');

    $id = $entity->getDataBasicEntity()->getId();
    $time = '';
    $filename = $entity->getFileNameEntity()->getFileName();
    $customer = $entity->getExclusiveFileEntity()->getCustomer();
    $this->assertEquals(
      AccessExclusiveFileModel::getCode($entity),
        md5(md5($time . $id) . $filename . $customer) . AccessExclusiveFileEntity::TYPE_ACCESS_TO_EXCLUSIVE_FILE
    );
  }
}