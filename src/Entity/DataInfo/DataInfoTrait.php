<?php
    namespace Armor\Trial\Entity\DataInfo;

    trait DataInfoTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\DataInfo\DataInfoEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataInfoEntity
         */
        protected $data_info;
        /**
         * @return DataInfoEntityInterface
         */
        public function getUserInfoEntity ()
        {
            return $this->data_info;
        }

        /**
         * @param DataInfoEntityInterface $dataInfoEntityInterface
         * @return $this
         */
        public function setUserInfoEntity(DataInfoEntityInterface $dataInfoEntityInterface)
        {
            $this->data_info = $dataInfoEntityInterface;
            return $this;
        }
    }