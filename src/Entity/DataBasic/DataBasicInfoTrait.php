<?php
namespace Armor\Trial\Entity\DataBasic;
use WhichBrowser\Parser;
trait DataBasicInfoTrait {
  public function getOS (DataBasicEntityInterface $entity) {
    $parser = new Parser($entity->getUserAgent());
    return $parser->os->getName() . " " . $parser->os->getVersion();
  }
  public function getBrowser (DataBasicEntityInterface $entity) {
    $parser = new Parser($entity->getUserAgent());
    return $parser->browser->getName() . " " . $parser->browser->getVersion();
  }
}