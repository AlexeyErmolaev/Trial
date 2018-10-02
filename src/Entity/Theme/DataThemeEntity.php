<?php
    namespace Armor\Trial\Entity\Theme;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_feedback")
     */
    class DataThemeEntity implements DataThemeEntityInterface, JsonSerializable
    {
        use DataBasicTrait;
        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         * @var int
         */
        protected $data_id = 0;
        /**
         * @theme @Column(type="string", length=255)
         * @var string
         */
        protected $theme;

        /**
         * @return int
         */
        public function getDataId ()
        {
            return $this->data_id;
        }

        /**
         * @param $data_id
         * @return $this
         */
        public function setDataId ( $data_id )
        {
            $this->data_id = $data_id;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getTheme ()
        {
            return $this->theme;
        }

        /**
         * @param $theme
         * @return $this
         */
        public function setTheme ( $theme )
        {
            $this->theme = $theme;
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
                "theme"=>$this->getTheme()
            ];
        }
    }