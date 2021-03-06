<?php
    namespace Armor\Trial\Entity\Theme;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetDataThemeEntityInterface
    extends
        GetDataThemeEntityInterface,
        SetDataThemeEntityInterface,
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface
    {}