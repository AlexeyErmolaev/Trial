<?php
    namespace Armor\Trial\Entity\Search;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;
    use WhichBrowser\Parser;

    /**
     * @Entity
     * @Table(name="data_log_search")
     */
    class SearchEntity implements SearchEntityInterface, JsonSerializable
    {
        use DataBasicTrait;

        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         */
        protected $data_id;

        /**
         * @request @Column(type="text")
         * @var string
         */
        protected $request;

        /**
         * @return string
         */
        public function getRequest ()
        {
            return $this->request;
        }

        /**
         * @param $request
         * @return $this
         */
        public function setRequest ( $request )
        {
            $this->request = $request;
            return $this;
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

        /**
         * Specify data which should be serialized to JSON
         * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return mixed data which can be serialized by <b>json_encode</b>,
         * which is a value of any type other than a resource.
         * @since 5.4.0
         */
        function jsonSerialize ()
        {
            $parser = new Parser($this->getDataBasicEntity()->getUserAgent());
            $browser = $parser->browser->getName() . " " . $parser->browser->getVersion();
            $os = $parser->os->getName() . " " . $parser->os->getVersion();

            return [
                "id"=>$this->getDataBasicEntity()->getId(),
                "requests"=>( (object) explode(";", mb_substr($this->getRequest(), 0, -1))),
                "created"=>$this->getDataBasicEntity()->getCreatedAt(),
                "user_info"=>[
                  "ip"=>($this->getDataBasicEntity()->getIp()),
                  "userAgent"=>$this->getDataBasicEntity()->getUserAgent(),
                  "created"=>$this->getDataBasicEntity()->getCreatedAt(),
                ],
                "browser"=>$browser,
                "operation_system"=>$os
            ];
        }

    }