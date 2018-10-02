<?php
    namespace Armor\Trial\Entity\License;

    trait DataLicenseEntityTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\License\DataLicenseEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataLicenseEntityInterface
         */
        protected $licenseEntity;
        /**
         * @return DataLicenseEntityInterface
         */
        public function getLicenseEntity()
        {
            return $this->licenseEntity;
        }

        /**
         * @param DataLicenseEntityInterface $licenseEntity
         * @return $this
         */
        public function setLicenseEntity(DataLicenseEntityInterface $licenseEntity)
        {
            $this->licenseEntity = $licenseEntity;
            return $this;
        }
    }