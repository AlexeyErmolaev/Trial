<?php
    namespace Armor\Trial\Entity\DataInfo;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataInfoEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
    {
        /**
         * @return int
         */
        public function getDataId ();

        /**
         * @param int $data_id
         * @return $this
         */
        public function setDataId ( $data_id );

        /**
         * @return string
         */
        public function getCompany ();

        /**
         * @param string $company
         * @return $this
         */
        public function setCompany ( $company );

        /**
         * @return string
         */
        public function getCountry ();

        /**
         * @param string $country
         * @return $this
         */
        public function setCountry ( $country );

        /**
         * @return string
         */
        public function getPhone ();

        /**
         * @param string $phone
         * @return $this
         */
        public function setPhone ( $phone );
    }