<?php
    namespace Armor\Trial\Entity\Main;

    use Armor\Trial\Entity\Comments\DataCommentsTrait;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use Armor\Trial\Entity\DataInfo\DataInfoTrait;
    use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
    use Armor\Trial\Entity\DataUser\DataUserTrait;
    use Armor\Trial\Entity\JobTitle\DataJobTitleTrait;
    use Armor\Trial\Entity\LogActions\DataLogsActionTrait;
    use Armor\Trial\Entity\Product\ProductTrait;
    use Armor\Trial\Entity\ServerType\DataServerTypeTrait;
    use Armor\Trial\Entity\Theme\DataThemeTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_type")
     */
    class MainEntity implements MainEntityInterface, JsonSerializable
    {
        use DataTypeEntityTrait;
        use DataUserTrait;
        use DataInfoTrait;
        use DataCommentsTrait;
        use DataJobTitleTrait;
        use DataLogsActionTrait;
        use DataServerTypeTrait;
        use ProductTrait;
        use DataThemeTrait;
        use DataBasicTrait;

        /**
         * Specify data which should be serialized to JSON
         * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return mixed data which can be serialized by <b>json_encode</b>,
         * which is a value of any type other than a resource.
         * @since 5.4.0
         */
        function jsonSerialize ()
        {
            return null;
        }
    }