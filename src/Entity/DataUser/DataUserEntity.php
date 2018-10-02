<?php
    namespace Armor\Trial\Entity\DataUser;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_user")
     */
    class DataUserEntity implements DataUserEntityInterface, JsonSerializable
    {
        use DataBasicTrait;
        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         * @var int
         */
        protected $data_id;
        /**
         * @user_name @Column(type="string", length=50)
         * @var string
         */
        protected $user_name;
        /**
         * @user_email @Column(type="string", length=255)
         * @var string
         */
        protected $user_email;

        /**
         * @return mixed
         */
        public function getDataId ()
        {
            return $this->data_id;
        }

        /**
         * @param mixed $data_id
         * @return $this
         */
        public function setDataId ( $data_id )
        {
            $this->data_id = $data_id;
            return $this;
        }


        /**
         * @return string
         */
        public function getUserName ()
        {
            return $this->user_name;
        }

        /**
         * @param $user_name
         * @return $this
         */
        public function setUserName ( $user_name )
        {
            $this->user_name = $user_name;
            return $this;
        }

        /**
         * @return string
         */
        public function getUserEmail ()
        {
            return $this->user_email;
        }

        /**
         * @param $user_email
         * @return $this
         */
        public function setUserEmail ( $user_email )
        {
            $this->user_email = $user_email;
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
                "email"=>$this->getUserEmail(),
                "name"=>$this->getUserName()
            ];
        }
    }