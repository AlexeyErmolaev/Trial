<?php
    namespace Armor\Trial\Entity\DataUser;

    trait DataUserTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\DataUser\DataUserEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataUserEntity
         */
        protected $data_user;
        /**
         * @return DataUserEntityInterface
         */
        public function getDataUserEntity ()
        {
            return $this->data_user;
        }

        /**
         * @param DataUserEntityInterface $dataUserEntityInterface
         * @return $this
         */
        public function setDataUserEntity(DataUserEntityInterface $dataUserEntityInterface)
        {
            $this->data_user = $dataUserEntityInterface;
            return $this;
        }
    }