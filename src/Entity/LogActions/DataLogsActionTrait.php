<?php
    namespace Armor\Trial\Entity\LogActions;

    trait DataLogsActionTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\LogActions\DataLogsActionEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataLogsActionEntityInterface
         */
        protected $logs_action;

        /**
         * @return DataLogsActionEntityInterface
         */
        public function getLogActionEntity ()
        {
            return $this->logs_action;
        }

        /**
         * @param DataLogsActionEntityInterface $logs_action
         * @return $this
         */
        public function setLogActionEntity ( DataLogsActionEntityInterface $logs_action )
        {
            $this->logs_action = $logs_action;
            return $this;
        }

    }