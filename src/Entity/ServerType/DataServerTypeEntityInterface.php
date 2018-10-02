<?php
    namespace Armor\Trial\Entity\ServerType;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataServerTypeEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
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
        public function getServerType ();

        /**
         * @param string $server_type
         * @return $this
         */
        public function setServerType ( $server_type );
    }