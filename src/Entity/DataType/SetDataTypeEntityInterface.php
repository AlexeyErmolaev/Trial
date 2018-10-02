<?php
    namespace Armor\Trial\Entity\DataType;

    interface SetDataTypeEntityInterface
    {
        /**
         * @param DataTypeEntityInterface $dataTypeEntityInterface
         * @return $this
         */
        public function setTypeEntity(DataTypeEntityInterface $dataTypeEntityInterface);
    }