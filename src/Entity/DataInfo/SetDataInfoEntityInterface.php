<?php
    namespace Armor\Trial\Entity\DataInfo;

    interface SetDataInfoEntityInterface
    {
        /**
         * @param DataInfoEntityInterface $dataInfoEntityInterface
         * @return $this
         */
        public function setUserInfoEntity(DataInfoEntityInterface $dataInfoEntityInterface);
    }