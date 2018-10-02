<?php
    namespace Armor\Trial\Entity\DataType;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataTypeEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
    {
        /**
         * @param $type string
         * @return $this
         */
        public function setType($type);

        /**
         * @return string
         */
        public function getType();

        const TYPE_DOWNLOAD = 1;
        const TYPE_GET_KEY = 2;
        const TYPE_FEED_BACK = 3;
        const TYPE_REQUEST = 4;
        const TYPE_SUPPORT = 5;
        const TYPE_PURCHASE = 6;
        const TYPE_LOGS = 7;
        const TYPE_ERRORS = 8;
        const TYPE_SECURITY_LOG = 10;
        const TYPE_GUIDE = 11;
        const TYPE_DOWNLOAD_EXCLUSIVE_FILE = 15;
        const TYPE_ACCESS_TO_EXCLUSIVE_FILE = 16;
        const TYPE_GENERATE_LICENSE = 1000;
    }