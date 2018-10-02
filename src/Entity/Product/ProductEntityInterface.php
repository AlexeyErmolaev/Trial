<?php
    namespace Armor\Trial\Entity\Product;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface ProductEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
    {
        /**
         * @return string
         */
        public function getOperatingSystem ();

        /**
         * @param string $operating_system
         * @return $this
         */
        public function setOperatingSystem ( $operating_system );

        /**
         * @return string
         */
        public function getDatabaseName ();

        /**
         * @param string $database_name
         * @return $this
         */
        public function setDatabaseName ( $database_name );
    }