<?php
    namespace Armor\Trial\Entity\DataUser;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetDataUserEntityInterface
    extends
        GetDataUserEntityInterface,
        SetDataUserEntityInterface,
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface
    {}