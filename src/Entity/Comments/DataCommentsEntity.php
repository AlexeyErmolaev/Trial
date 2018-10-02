<?php
    namespace Armor\Trial\Entity\Comments;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_comments")
     */
    class DataCommentsEntity implements DataCommentsEntityInterface, JsonSerializable
    {
        use DataBasicTrait;
        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         * @var int
         */
        protected $id_data;
        /**
         * @comment @Column(type="text")
         * @var string
         */
        protected $comment;

        /**
         * @return int
         */
        public function getIdData ()
        {
            return $this->id_data;
        }

        /**
         * @param $id_data
         * @return $this
         */
        public function setIdData ( $id_data )
        {
            $this->id_data = $id_data;
            return $this;
        }

        /**
         * @return string
         */
        public function getComment ()
        {
            return $this->comment;
        }

        /**
         * @param $comment
         * @return $this
         */
        public function setComment ( $comment )
        {
            $this->comment = $comment;
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
                "comments"=>$this->getComment(),
            ];
        }
    }