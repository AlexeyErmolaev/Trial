<?php
    namespace Armor\Trial\Entity\License;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use DateTime;
    /**
     * @Entity
     * @Table(name="data_license")
     */
    class DataLicenseEntity implements DataLicenseEntityInterface
    {
        use DataBasicTrait;

        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         */
        protected $data_id;
        /**
         * @duration @Column(type="datetime")
         * @var DateTime
         */
        protected $duration;

        /**
         * @license_type @Column(type="integer")
         * @var int
         */
        protected $license_type;

        /**
         * @key_activation @Column(type="string", length=1000)
         * @var string
         */
        protected $key_activation;

        /**
         * @return DateTime
         */
        public function getDuration ()
        {
            return $this->duration;
        }

        /**
         * @param DateTime $duration
         * @return $this
         */
        public function setDuration ( DateTime $duration )
        {
            $this->duration = $duration;
            return $this;
        }

        /**
         * @return string
         */
        public function getLicenseType()
        {
            return $this->license_type;
        }

        /**
         * @param $licenseType int
         * @return $this
         */
        public function setLicenseType($licenseType)
        {
            $this->license_type = $licenseType;
            return $this;
        }

        /**
         * @return string
         */
        public function getKeyActivation()
        {
            return $this->key_activation;
        }

        /**
         * @param $key string
         * @return $this
         */
        public function setKeyActivation($key)
        {
            $this->key_activation = $key;
            return $this;
        }


    }