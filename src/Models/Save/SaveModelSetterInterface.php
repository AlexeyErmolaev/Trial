<?php
    namespace Armor\Trial\Models\Save;

    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Exceptions\EntityIsNotImplementedInterface;
    use DateTime;
    use GothicPrince\UserLog\Models\ILog;

    interface SaveModelSetterInterface
    {
        /**
         * @param DateTime $date
         * @param          $ip
         * @param          $userAgent
         * @param          $status
         * @param null     $id
         * @return $this
         */
        public function setBasic(\DateTime $date, $ip, $userAgent, $status, $id = null);

        /**
         * @param $logs ILog[]
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setLog($logs);

        /**
         * @param $os
         * @param $db
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setProduct($os, $db);

        /**
         * @param $theme
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setTheme($theme);

        /**
         * @param $organization
         * @param $country
         * @param $phone
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setDataInfo($organization, $country, $phone);

        /**
         * @param $email
         * @param $name
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setDataUser($email, $name);

        /**
         * @param $comment
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setComment($comment);

        /**
         * @param $jobTitle
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setJobTitle($jobTitle);

        /**
         * @param $serverType
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setServerType($serverType);

        /**
         * @param DateTime $duration
         * @param string $code
         * @param int $licenseType
         * @return $this
         */
        public function setLicense(DateTime $duration, $code, $licenseType);

        /**
         * @param $fileName
         * @return $this
         * @throws EntityIsNotImplementedInterface
         */
        public function setFileName($fileName);

        /**
         * @param GetDataBasicEntityInterface $entity
         */
        public function setEntity ( GetDataBasicEntityInterface $entity );


    }