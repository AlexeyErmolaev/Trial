<?php
    namespace Armor\Trial\Entity\Support;
    use Armor\Trial\Entity\Comments\GetSetDataCommentsEntityInterface;
    use Armor\Trial\Entity\DataInfo\GetSetDataInfoEntityInterface;
    use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataUser\GetSetDataUserEntityInterface;
    use Armor\Trial\Entity\JobTitle\GetSetDataJobTitleEntityInterface;
    use Armor\Trial\Entity\LogActions\GetDataLogsActionEntityInterface;
    use Armor\Trial\Entity\LogActions\SetDataLogsActionTraitInterfaces;
    use Armor\Trial\Entity\Product\GetProductEntityInterface;
    use Armor\Trial\Entity\Product\SetProductEntityInterface;
    use Armor\Trial\Entity\ServerType\GetDataServerTypeEntityInterface;
    use Armor\Trial\Entity\ServerType\SetDataServerTypeEntityInterface;
    use Armor\Trial\Entity\Theme\GetSetDataThemeEntityInterface;

    interface
        SupportEntityInterface
    extends
        /* Getters */
        GetProductEntityInterface,
        GetDataBasicEntityInterface,
        GetDataServerTypeEntityInterface,
        GetDataLogsActionEntityInterface,
        /* Setters */
        SetProductEntityInterface,
        SetDataBasicEntityInterface,
        SetDataServerTypeEntityInterface,
        SetDataLogsActionTraitInterfaces,
        /* Root */
        DataTypeEntityInterface,
        GetSetDataJobTitleEntityInterface,
        GetSetDataCommentsEntityInterface,
        GetSetDataUserEntityInterface,
        GetSetDataInfoEntityInterface,
        GetSetDataThemeEntityInterface
    {}