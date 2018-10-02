<?php
    namespace Armor\Trial\Entity\LogActions;

    interface DataLogsActionTraitInterfaces
    {
        /**
         * @return DataLogsActionEntityInterface
         */
        public function getLogsAction ();

        /**
         * @param DataLogsActionEntityInterface $logs_action
         * @return $this
         */
        public function setLogsAction ( DataLogsActionEntityInterface $logs_action );
    }