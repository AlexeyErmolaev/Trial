<?php
    namespace Armor\Trial\Entity\ServerType;

    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetServerTypeEntityInterface
    extends
        GetDataServerTypeEntityInterface,
        SetDataServerTypeEntityInterface,
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface
    {}