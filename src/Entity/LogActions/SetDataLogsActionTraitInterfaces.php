<?php
    namespace Armor\Trial\Entity\LogActions;

    interface SetDataLogsActionTraitInterfaces
    {
        /**
         * @param DataLogsActionEntityInterface $actionTraitInterfaces
         * @return $this
         */
        public function setLogActionEntity(DataLogsActionEntityInterface $actionTraitInterfaces);
    }