<?php
namespace Armor\Trial\Entity\AccessExclusiveFileEntity;
use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
use Armor\Trial\Entity\Author\GetDataAuthorEntityInterface;
use Armor\Trial\Entity\Author\SetDataAuthorEntityInterface;
use Armor\Trial\Entity\GuideRequest\GetSetDataFileNameEntityInterface;

interface
  AccessExclusiveFileEntityInterface
extends
  DataTypeEntityInterface,
  GetDataAuthorEntityInterface,
  SetDataAuthorEntityInterface,
  GetAccessExclusiveFileEntityInterface,
  GetSetDataFileNameEntityInterface,
  SetAccessExclusiveFileEntityInterface
{

}