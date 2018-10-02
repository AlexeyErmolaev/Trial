<?php
namespace Armor\Trial\Entity\GuideRequest;
use Armor\Trial\Entity\Comments\GetSetDataCommentsEntityInterface;
use Armor\Trial\Entity\DataInfo\GetSetDataInfoEntityInterface;
use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
use Armor\Trial\Entity\DataUser\GetSetDataUserEntityInterface;
use Armor\Trial\Entity\JobTitle\GetSetDataJobTitleEntityInterface;
use Armor\Trial\Entity\LogActions\GetSetLogsActionEntityInterface;

interface
    DataGuideRequestEntityInterface
extends
    DataTypeEntityInterface,
    GetSetDataJobTitleEntityInterface,
    GetSetDataUserEntityInterface,
    GetSetDataInfoEntityInterface,
    GetSetLogsActionEntityInterface,
    GetSetDataFileNameEntityInterface,
    GetSetDataCommentsEntityInterface
    {

    }