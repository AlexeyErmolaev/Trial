<?php
    namespace Armor\Trial\Entity\DataBasic;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_basic")
     */
    class DataBasicEntity implements DataBasicEntityInterface, JsonSerializable
    {
        /**
         * @id @Column(type="integer")
         * @GeneratedValue(strategy="AUTO")
         * @var int
         */
        protected $id;
        /**
         * @ip @Column(type="string", length=50)
         * @var string
         */
        protected $ip;
        /**
         * @created_at @Column(type="datetime")
         * @var \DateTime
         */
        protected $created_at;
        /**
         * @user_agent @Column(type="text")
         * @var string
         */
        protected $user_agent;
        /**
         * @status @Column(type="integer")
         * @var int
         */
        protected $status = 0;

        /**
         * @return int
         */
        public function getId ()
        {
            return $this->id;
        }

        /**
         * @param int $id
         * @return $this
         */
        public function setId ( $id )
        {
            $this->id = $id;
            return $this;
        }

        /**
         * @return string
         */
        public function getIp ()
        {
            return $this->ip;
        }

        /**
         * @param string $ip
         * @return $this
         */
        public function setIp ( $ip )
        {
            $this->ip = $ip;
            return $this;
        }

        /**
         * @return \DateTime
         */
        public function getCreatedAt ()
        {
            return $this->created_at;
        }

        /**
         * @param \DateTime $created_at
         * @return $this
         */
        public function setCreatedAt (\DateTime $created_at )
        {
            $this->created_at = $created_at;
            return $this;
        }

        /**
         * @return string
         */
        public function getUserAgent ()
        {
            return $this->user_agent;
        }

        /**
         * @param string $user_agent
         * @return $this
         */
        public function setUserAgent ( $user_agent )
        {
            $this->user_agent = $user_agent;
            return $this;
        }

        /**
         * @return int
         */
        public function getStatus ()
        {
            return intval($this->status);
        }

        /**
         * @param int $status
         * @return $this
         */
        public function setStatus ( $status )
        {
            $this->status = (string) $status;
            return $this;
        }

        /**
         * Specify data which should be serialized to JSON
         * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return mixed data which can be serialized by <b>json_encode</b>,
         * which is a value of any type other than a resource.
         * @since 5.4.0
         */
        function jsonSerialize ()
        {
            return [
                "status"=>$this->getStatus(),
                "created"=>$this->getCreatedAt()->format("d.m.Y H:i"),
                "id"=>$this->getId(),
                "ip"=>long2ip($this->getIp()),
                "userAgent"=>$this->getUserAgent(),
                "browser"=>"",
                "os"=>"",
            ];
        }
    }