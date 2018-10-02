<?php
namespace Armor\Trial\Entity\GuideRequest;

use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

interface DataFileNameEntityInterface extends GetDataBasicEntityInterface , SetDataBasicEntityInterface
{
    /**
     * @return string
     */
    public function getFileName();

    /**
     * @param $fileName
     * @return $this
     */
    public function setFileName($fileName);
}