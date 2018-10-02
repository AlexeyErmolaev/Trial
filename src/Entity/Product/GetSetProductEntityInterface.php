<?php
    namespace Armor\Trial\Entity\Product;

    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetProductEntityInterface
    extends
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface,
        GetProductEntityInterface,
        SetProductEntityInterface
    {}