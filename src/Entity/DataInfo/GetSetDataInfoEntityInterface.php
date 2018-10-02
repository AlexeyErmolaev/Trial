<?php
    namespace Armor\Trial\Entity\DataInfo;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetDataInfoEntityInterface
    extends
        GetDataInfoEntityInterface,
        SetDataInfoEntityInterface,
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface
    {}