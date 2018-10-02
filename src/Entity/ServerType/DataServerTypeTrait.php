<?php
    namespace Armor\Trial\Entity\ServerType;

    trait DataServerTypeTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\ServerType\DataServerTypeEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataServerTypeEntityInterface
         */
        protected $server_type;

        /**
         * @return DataServerTypeEntityInterface
         */
        public function getServerTypeEntity ()
        {
            return $this->server_type;
        }

        /**
         * @param DataServerTypeEntityInterface $dataServerTypeEntityInterface
         * @return $this
         */
        public function setServerTypeEntity(DataServerTypeEntityInterface $dataServerTypeEntityInterface)
        {
            $this->server_type = $dataServerTypeEntityInterface;
            return $this;
        }
    }