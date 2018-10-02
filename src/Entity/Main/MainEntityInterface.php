<?php
    namespace Armor\Trial\Entity\Main;
    use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
    use Armor\Trial\Entity\Comments\GetDataCommentsEntityInterface;
    use Armor\Trial\Entity\Comments\SetDataCommentsEntityInterface;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataInfo\GetDataInfoEntityInterface;
    use Armor\Trial\Entity\DataInfo\SetDataInfoEntityInterface;
    use Armor\Trial\Entity\DataUser\GetDataUserEntityInterface;
    use Armor\Trial\Entity\DataUser\SetDataUserEntityInterface;
    use Armor\Trial\Entity\JobTitle\GetDataJobTitleEntityInterface;
    use Armor\Trial\Entity\JobTitle\SetDataJobTitleEntityInterface;
    use Armor\Trial\Entity\LogActions\GetDataLogsActionEntityInterface;
    use Armor\Trial\Entity\LogActions\SetDataLogsActionTraitInterfaces;
    use Armor\Trial\Entity\Product\GetProductEntityInterface;
    use Armor\Trial\Entity\Product\SetProductEntityInterface;
    use Armor\Trial\Entity\ServerType\GetDataServerTypeEntityInterface;
    use Armor\Trial\Entity\ServerType\SetDataServerTypeEntityInterface;
    use Armor\Trial\Entity\Theme\GetDataThemeEntityInterface;
    use Armor\Trial\Entity\Theme\SetDataThemeEntityInterface;

    interface
        MainEntityInterface
    extends
        /* Getters */
        GetProductEntityInterface,
        GetDataBasicEntityInterface,
        GetDataJobTitleEntityInterface,
        GetDataInfoEntityInterface,
        GetDataCommentsEntityInterface,
        GetDataUserEntityInterface,
        GetDataServerTypeEntityInterface,
        GetDataLogsActionEntityInterface,
        GetDataThemeEntityInterface,
        /* Setters */
        SetProductEntityInterface,
        SetDataBasicEntityInterface,
        SetDataJobTitleEntityInterface,
        SetDataInfoEntityInterface,
        SetDataCommentsEntityInterface,
        SetDataUserEntityInterface,
        SetDataServerTypeEntityInterface,
        SetDataLogsActionTraitInterfaces,
        SetDataThemeEntityInterface,
        /* Root */
        DataTypeEntityInterface
        {

        }
