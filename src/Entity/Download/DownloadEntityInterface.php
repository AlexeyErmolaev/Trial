<?php
    namespace Armor\Trial\Entity\Download;
    use Armor\Trial\Entity\Comments\GetSetDataCommentsEntityInterface;
    use Armor\Trial\Entity\DataInfo\GetSetDataInfoEntityInterface;
    use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
    use Armor\Trial\Entity\DataUser\GetSetDataUserEntityInterface;
    use Armor\Trial\Entity\JobTitle\GetSetDataJobTitleEntityInterface;
    use Armor\Trial\Entity\License\GetSetDataLicenseEntity;
    use Armor\Trial\Entity\LogActions\GetSetLogsActionEntityInterface;
    use Armor\Trial\Entity\Product\GetSetProductEntityInterface;
    use Armor\Trial\Entity\ServerType\GetSetServerTypeEntityInterface;

    interface
        DownloadEntityInterface
    extends
        DataTypeEntityInterface,
        GetSetDataJobTitleEntityInterface,
        GetSetDataCommentsEntityInterface,
        GetSetDataUserEntityInterface,
        GetSetDataInfoEntityInterface,
        GetSetLogsActionEntityInterface,
        GetSetProductEntityInterface,
        GetSetServerTypeEntityInterface,
        GetSetDataLicenseEntity
        {

        }