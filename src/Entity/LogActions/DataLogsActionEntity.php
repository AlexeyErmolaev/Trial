<?php
    namespace Armor\Trial\Entity\LogActions;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use GothicPrince\UserLog\Models\ILog;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_log_action")
     */
    class DataLogsActionEntity implements DataLogsActionEntityInterface, JsonSerializable
    {
        use DataBasicTrait;
        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         */
        protected $data_id;

        /**
         * @serialize_log @Column(type="text")
         * @var string
         */
        protected $serialize_log;


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
         * @return ILog[]
         */
        public function getSerializeLog ()
        {
            return unserialize($this->serialize_log);
        }

        /**
         * @param ILog[] $serialize_log
         * @return $this
         */
        public function setSerializeLog ( $serialize_log )
        {
            $this->serialize_log = serialize($serialize_log);
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
                "logs"=>$this->getSerializeLog()
            ];
        }
    }