<?php
namespace Armor\Trial\Models\DownloadExclusiveFileModel;
use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
use Armor\Trial\Entity\Result\DataResultEntityInterface;
use PHPUnit_Framework_TestCase;

class DownloadExclusiveFileEntityFactoryTest extends PHPUnit_Framework_TestCase {
  public function testCreate() {
    $factory = new DownloadExclusiveFileEntityFactory('127.0.0.1', 'user agent...');
    $entity = $factory->create('our company', 'Alex', '/download/file-1', false);
    $basicEntity = $entity->getDataBasicEntity();
    $this->assertEquals(2130706433, $entity->getDataBasicEntity()->getIp());
    $this->assertEquals('user agent...', $entity->getDataBasicEntity()->getUserAgent());
    $this->assertEquals('our company', $entity->getDataUserEntity()->getUserEmail());
    $this->assertEquals('Alex', $entity->getDataUserEntity()->getUserName());
    $this->assertEquals('/download/file-1', $entity->getURLEntity()->getURL());
    $this->assertEquals(15, $entity->getType());

    $this->assertEquals(1, count($entity->getResults()->getValues()));
    $this->assertEquals($entity->getResult($entity::RESULT_TYPE_EXCLUSIVE_FILE) instanceof DataResultEntityInterface, true);
    /**
     * @var $resultEntity DataResultEntityInterface
     */
    $resultEntity = $entity->getResult($entity::RESULT_TYPE_EXCLUSIVE_FILE);
    $this->assertEquals($resultEntity->getType(), 'exclusive_file');
    $this->assertEquals($resultEntity->getValue(), false);

    $this->assertEquals($basicEntity instanceof DataBasicEntityInterface, true);
    $this->assertEquals($entity->getDataBasicEntity(), $basicEntity);
    $this->assertEquals($entity->getURLEntity()->getDataBasicEntity(), $basicEntity);
    $this->assertEquals($entity->getDataUserEntity()->getDataBasicEntity(), $basicEntity);
    $this->assertEquals($resultEntity->getDataBasicEntity(), $basicEntity);
  }
}