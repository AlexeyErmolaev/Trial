<?php
    namespace Armor\Trial\Entity\Search;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface SearchEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
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
        public function getRequest();

        /**
         * @param $request
         * @return $this
         */
        public function setRequest($request);
    }