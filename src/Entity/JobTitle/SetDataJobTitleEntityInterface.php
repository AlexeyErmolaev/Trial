<?php
    namespace Armor\Trial\Entity\JobTitle;

    interface SetDataJobTitleEntityInterface
    {
        /**
         * @param DataJobTitleEntityInterface $dataJobTitleEntityInterface
         * @return $this
         */
        public function setJobTitleEntity(DataJobTitleEntityInterface $dataJobTitleEntityInterface);
    }