<?php
namespace Armor\Trial\Entity\DownloadExclusiveFile;
use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
use Armor\Trial\Entity\DataUser\GetSetDataUserEntityInterface;
use Armor\Trial\Entity\GuideRequest\GetSetDataFileNameEntityInterface;
use Armor\Trial\Entity\Result\DataResultEntityInterface;
use Armor\Trial\Entity\URL\GetDataURLEntityInterface;
use Armor\Trial\Entity\URL\SetDataURLEntityInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface
  DownloadExclusiveFileEntityInterface
extends
  DataTypeEntityInterface,
  GetSetDataUserEntityInterface,
  GetDataURLEntityInterface,
  SetDataURLEntityInterface,
  GetSetDataFileNameEntityInterface {
  /**
   * @return ArrayCollection<DataResultEntityInterface>
   */
  public function getResults();
  /**
   * @param $type string
   * @return DataResultEntityInterface
   */
  public function getResult($type);
  const RESULT_TYPE_EXCLUSIVE_FILE = DataResultEntityInterface::RESULT_TYPE_EXCLUSIVE_FILE;
}