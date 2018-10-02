<?php
    namespace Armor\Trial\Entity\DataUser;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataUserEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
    {
        /**
         * @param int $data_id
         * @return $this
         */
        public function setDataId ( $data_id );

        /**
         * @return string
         */
        public function getUserName ();

        /**
         * @param $user_name
         * @return $this
         */
        public function setUserName ( $user_name );

        /**
         * @return string
         */
        public function getUserEmail ();

        /**
         * @param $user_email
         * @return $this
         */
        public function setUserEmail ( $user_email );
    }