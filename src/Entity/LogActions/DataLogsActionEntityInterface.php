<?php
    namespace Armor\Trial\Entity\LogActions;

    use GothicPrince\UserLog\Models\ILog;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataLogsActionEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
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
         * @return ILog[]
         */
        public function getSerializeLog ();

        /**
         * @param $serialize_log
         * @return $this
         */
        public function setSerializeLog ( $serialize_log );
    }