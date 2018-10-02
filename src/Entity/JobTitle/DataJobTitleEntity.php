<?php
    namespace Armor\Trial\Entity\JobTitle;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_job_title")
     */
    class DataJobTitleEntity implements DataJobTitleEntityInterface, JsonSerializable
    {
        use DataBasicTrait;

        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         */
        protected $data_id;

        /**
         * @job_title @Column(type="string", length=255)
         * @var string
         */
        protected $job_title;

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
        public function getJobTitle ()
        {
            return $this->job_title;
        }

        /**
         * @param string $job_title
         * @return $this
         */
        public function setJobTitle ( $job_title )
        {
            $this->job_title = $job_title;
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
                "jobtitle"=>$this->getJobTitle()
            ];
        }
    }