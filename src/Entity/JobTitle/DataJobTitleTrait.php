<?php
    namespace Armor\Trial\Entity\JobTitle;
    trait DataJobTitleTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\JobTitle\DataJobTitleEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataJobTitleEntity
         */
        protected $jobTitle;

        /**
         * @return DataJobTitleEntityInterface
         */
        public function getJobTitleEntity ()
        {
            return $this->jobTitle;
        }

        /**
         * @param DataJobTitleEntityInterface $dataJobTitleEntityInterface
         * @return $this
         */
        public function setJobTitleEntity(DataJobTitleEntityInterface $dataJobTitleEntityInterface)
        {
            $this->jobTitle = $dataJobTitleEntityInterface;
            return $this;
        }
    }