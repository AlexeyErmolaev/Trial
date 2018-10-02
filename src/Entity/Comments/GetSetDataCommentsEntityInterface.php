<?php
    namespace Armor\Trial\Entity\Comments;

    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface
        GetSetDataCommentsEntityInterface
    extends
        GetDataCommentsEntityInterface,
        SetDataCommentsEntityInterface,
        GetDataBasicEntityInterface,
        SetDataBasicEntityInterface
        {}