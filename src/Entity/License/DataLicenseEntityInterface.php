<?php
    namespace Armor\Trial\Entity\License;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;
    use DateTime;

    interface
        DataLicenseEntityInterface
    extends
    GetDataBasicEntityInterface,
    SetDataBasicEntityInterface
    {
        const TRIAL_LICENSE_TYPE = 1;
        const TERM_LICENSE_TYPE = 2;
        const PERMANENT_LICENSE_TYPE = 3;

        /**
         * @return DateTime
         */
        public function getDuration ();

        /**
         * @param DateTime $duration
         * @return $this
         */
        public function setDuration ( DateTime $duration );

        /**
         * @return string
         */
        public function getLicenseType();

        /**
         * @param $licenseType int
         * @return $this
         */
        public function setLicenseType($licenseType);

        /**
         * @return string
         */
        public function getKeyActivation();

        /**
         * @param $key string
         * @return $this
         */
        public function setKeyActivation($key);

    }