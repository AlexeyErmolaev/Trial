<?php
    namespace Armor\Trial\Entity\DataType;

    /**
     * @Entity
     * @Table(name="data_type")
     */
    trait DataTypeEntityTrait
    {
        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         * @var int
         */
        protected $data_id;
        /**
         * @type @Column(type="integer")
         * @var int
         */
        protected $type;

        /**
         * @param $type int
         * @return $this
         */
        public function setType($type)
        {
            $this->type = $type;
            return $this;
        }
        /**
         * @return int
         */
        public function getType ()
        {
            return $this->type;
        }

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
    }