<?php
    namespace Armor\Trial\Entity\LogActions;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetLogsActionEntityInterface
    extends
        GetDataLogsActionEntityInterface,
        SetDataLogsActionTraitInterfaces,
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface
    {}