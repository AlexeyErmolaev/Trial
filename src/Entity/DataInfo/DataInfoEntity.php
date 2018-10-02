<?php
    namespace Armor\Trial\Entity\DataInfo;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_info")
     */
    class DataInfoEntity implements DataInfoEntityInterface, JsonSerializable
    {
        use DataBasicTrait;
        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         */
        protected $data_id;
        /**
         * @company @Column(type="string", length=50)
         * @var string
         */
        protected $company = "";
        /**
         * @country @Column(type="string", length=50)
         * @var string
         */
        protected $country = "";
        /**
         * @phone @Column(type="string", length=25)
         * @var string
         */
        protected $phone = "";

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
        public function getCompany ()
        {
            return $this->company;
        }

        /**
         * @param string $company
         * @return $this
         */
        public function setCompany ( $company )
        {
            $this->company = $company;
            return $this;
        }

        /**
         * @return string
         */
        public function getCountry ()
        {
            return $this->country;
        }

        /**
         * @param string $country
         * @return $this
         */
        public function setCountry ( $country )
        {
            $this->country = $country;
            return $this;
        }

        /**
         * @return string
         */
        public function getPhone ()
        {
            return $this->phone;
        }

        /**
         * @param string $phone
         * @return $this
         */
        public function setPhone ( $phone )
        {
            $this->phone = $phone;
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
                "organization"=>$this->getCompany(),
                "country"=>$this->getCountry(),
                "phone"=>$this->getPhone()
            ];
        }

    }