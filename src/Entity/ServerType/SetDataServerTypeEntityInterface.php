<?php
    namespace Armor\Trial\Entity\ServerType;

    interface SetDataServerTypeEntityInterface
    {
        /**
         * @param DataServerTypeEntityInterface $dataServerTypeEntityInterface
         * @return $this
         */
        public function setServerTypeEntity(DataServerTypeEntityInterface $dataServerTypeEntityInterface);
    }