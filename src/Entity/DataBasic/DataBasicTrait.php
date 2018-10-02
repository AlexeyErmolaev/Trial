<?php
    namespace Armor\Trial\Entity\DataBasic;

    trait DataBasicTrait
    {

        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\DataBasic\DataBasicEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="id")
         * @var DataBasicEntity
         */
        protected $data_basic;
        /**
         * @return DataBasicEntityInterface
         */
        public function getDataBasicEntity ()
        {
            return $this->data_basic;
        }

        /**
         * @param DataBasicEntityInterface $basicEntityInterface
         * @return $this
         */
        public function setDataBasicEntity(DataBasicEntityInterface $basicEntityInterface)
        {
            $this->data_basic = $basicEntityInterface;
            return $this;
        }
    }