<?php
    namespace Armor\Trial\Entity\ServerType;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_server_type")
     */
    class DataServerTypeEntity implements DataServerTypeEntityInterface, JsonSerializable
    {
        const SERVER_DEFAULT = "GENERAL";
        const SERVER_AWS = "AWS";
        const SERVER_AZURE = "AZURE";

        use DataBasicTrait;
        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         */
        protected $data_id = 0;

        /**
         * @server_type @Column(type="string", length=50)
         * @var string
         */
        protected $server_type = "";

        /**
         * @return int
         */
        public function getDataId ()
        {
            return $this->data_id;
        }

        /**
         * @param int $data_id
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
        public function getServerType ()
        {
            return $this->server_type;
        }

        /**
         * @param string $server_type
         * @return $this
         */
        public function setServerType ( $server_type )
        {
            $this->server_type = $server_type;
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
                "server"=>$this->getServerType()
            ];
        }

    }