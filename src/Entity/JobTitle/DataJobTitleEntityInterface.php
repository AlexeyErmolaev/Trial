<?php
    namespace Armor\Trial\Entity\JobTitle;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataJobTitleEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
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
        public function getJobTitle ();

        /**
         * @param string $job_title
         * @return $this
         */
        public function setJobTitle ( $job_title );
    }