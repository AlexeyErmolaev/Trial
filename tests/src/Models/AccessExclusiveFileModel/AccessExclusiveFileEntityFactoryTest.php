<?php
namespace Armor\Trial\Models\AccessExclusiveFileModel;
use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
use PHPUnit_Framework_TestCase;
class AccessExclusiveFileEntityFactoryTest extends PHPUnit_Framework_TestCase{
  public function testCreate() {
    $factory = new AccessExclusiveFileEntityFactory('admin', '127.0.0.1', 'user agent #2');
    $entity = $factory->create('company', 'summary.pdf');

    $this->assertEquals($entity->getDataBasicEntity() instanceof DataBasicEntityInterface, true);
    $this->assertEquals($entity->getExclusiveFileEntity()->getDataBasicEntity(), $entity->getDataBasicEntity());
    $this->assertEquals($entity->getAuthorEntity()->getDataBasicEntity(), $entity->getDataBasicEntity());

    $this->assertEquals($entity->getDataBasicEntity()->getIp(), 2130706433);
    $this->assertEquals($entity->getDataBasicEntity()->getUserAgent(), 'user agent #2');
    $this->assertEquals($entity->getAuthorEntity()->getAuthor(), 'admin');
    $this->assertEquals($entity->getExclusiveFileEntity()->getCustomer(), 'company');
    $this->assertEquals($entity->getFileNameEntity()->getFileName(), 'summary.pdf');
  }
}