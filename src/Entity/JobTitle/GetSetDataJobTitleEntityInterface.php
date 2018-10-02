<?php
    namespace Armor\Trial\Entity\JobTitle;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetDataJobTitleEntityInterface
    extends
        GetDataJobTitleEntityInterface,
        SetDataJobTitleEntityInterface,
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface
    {}