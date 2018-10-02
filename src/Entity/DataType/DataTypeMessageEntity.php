<?php
    namespace Armor\Trial\Entity\DataType;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;

    /**
     * @Entity
     * @Table(name="data_type")
     */
    class DataTypeMessageEntity implements DataTypeEntityInterface
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
    }