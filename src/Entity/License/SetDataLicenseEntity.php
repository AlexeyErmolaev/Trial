<?php
    namespace Armor\Trial\Entity\License;

    interface SetDataLicenseEntity
    {
        /**
         * @param DataLicenseEntityInterface $licenseEntity
         * @return $this
         */
        public function setLicenseEntity(DataLicenseEntityInterface $licenseEntity);
    }