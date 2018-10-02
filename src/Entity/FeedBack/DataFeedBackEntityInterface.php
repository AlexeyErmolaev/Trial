<?php
    namespace Armor\Trial\Entity\FeedBack;
    use Armor\Trial\Entity\Comments\GetSetDataCommentsEntityInterface;
    use Armor\Trial\Entity\DataInfo\GetSetDataInfoEntityInterface;
    use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
    use Armor\Trial\Entity\DataUser\GetSetDataUserEntityInterface;
    use Armor\Trial\Entity\JobTitle\GetSetDataJobTitleEntityInterface;
    use Armor\Trial\Entity\LogActions\GetSetLogsActionEntityInterface;
    use Armor\Trial\Entity\Theme\GetSetDataThemeEntityInterface;

    interface
        DataFeedBackEntityInterface
    extends
        DataTypeEntityInterface,
        GetSetDataJobTitleEntityInterface,
        GetSetDataCommentsEntityInterface,
        GetSetDataUserEntityInterface,
        GetSetDataInfoEntityInterface,
        GetSetDataThemeEntityInterface,
        GetSetLogsActionEntityInterface
        {

        }