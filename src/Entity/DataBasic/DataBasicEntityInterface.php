<?php
    namespace Armor\Trial\Entity\DataBasic;

    interface DataBasicEntityInterface
    {
        /**
         * @return int
         */
        public function getId ();

        /**
         * @param int $id
         * @return $this
         */
        public function setId ( $id );

        /**
         * @return string
         */
        public function getIp ();

        /**
         * @param string $ip
         * @return $this
         */
        public function setIp ( $ip );

        /**
         * @return \DateTime
         */
        public function getCreatedAt ();

        /**
         * @param \DateTime $created_at
         * @return $this
         */
        public function setCreatedAt (\DateTime $created_at );

        /**
         * @return string
         */
        public function getUserAgent ();

        /**
         * @param string $user_agent
         * @return $this
         */
        public function setUserAgent ( $user_agent );

        /**
         * @return int
         */
        public function getStatus ();

        /**
         * @param int $status
         * @return $this
         */
        public function setStatus ( $status );
    }