<?php
namespace Armor\Trial\Entity\HasNewVersion;

interface HasNewVersionEntityInterface {
  public function hasNewVersion();
  public function setHavingNewVersion($bool);
}