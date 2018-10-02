<?php
    namespace Armor\Trial\Entity\Comments;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataCommentsEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
    {
        /**
         * @return int
         */
        public function getIdData ();

        /**
         * @param $id_data
         * @return $this
         */
        public function setIdData ( $id_data );

        /**
         * @return string
         */
        public function getComment ();

        /**
         * @param $comment
         * @return $this
         */
        public function setComment ( $comment );
    }