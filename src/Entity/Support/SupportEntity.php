<?php
    namespace Armor\Trial\Entity\Support;
    use Armor\Trial\Entity\Comments\DataCommentsTrait;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use Armor\Trial\Entity\DataInfo\DataInfoTrait;
    use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
    use Armor\Trial\Entity\DataUser\DataUserTrait;
    use Armor\Trial\Entity\JobTitle\DataJobTitleTrait;
    use Armor\Trial\Entity\LogActions\DataLogsActionTrait;
    use Armor\Trial\Entity\Product\ProductTrait;
    use Armor\Trial\Entity\ServerType\DataServerTypeTrait;
    use Armor\Trial\Entity\Theme\DataThemeTrait;
    use JsonSerializable;
    use WhichBrowser\Parser;

    /**
     * @Entity
     * @Table(name="data_type")
     */
    class SupportEntity implements SupportEntityInterface, JsonSerializable
    {
        const TYPE = self::TYPE_SUPPORT;
        use DataServerTypeTrait;
        use DataJobTitleTrait;
        use DataUserTrait;
        use DataInfoTrait;
        use DataCommentsTrait;
        use DataLogsActionTrait;
        use DataThemeTrait;
        use ProductTrait;
        use DataTypeEntityTrait;
        use DataBasicTrait;

        public function __construct ()
        {
            $this->setType(self::TYPE);
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

            try
            {
                $logs = $this->getLogActionEntity()->getSerializeLog();
            }
            catch(\Exception $e){
                $logs = [];
            };

            $json = array(
                "id"=>$this->getDataBasicEntity()->getId(),
                "version"=>3,
                "logs"=>$logs,
                "type"=>self::TYPE,
                "user_info"=>array(
                    "created"=>$this->getDataBasicEntity()->getCreatedAt(),
                    "ip"=>long2ip($this->getDataBasicEntity()->getIp()),
                    "browser"=>$browser,
                    "operation_system"=>$os
                ),
                "user_data"=>array(
                    "email"=>$this->getDataUserEntity()->getUserEmail(),
                    "name"=>$this->getDataUserEntity()->getUserName(),
                    "company"=>$this->getUserInfoEntity()->getCompany(),
                    "country"=>$this->getUserInfoEntity()->getCountry(),
                    "phone"=>$this->getUserInfoEntity()->getPhone(),
                    "theme"=>$this->getThemeEntity()->getTheme(),
                    "db"=>$this->getProductEntity()->getDatabaseName(),
                    "os"=>$this->getProductEntity()->getOperatingSystem(),
                    "userAgent"=>$this->getDataBasicEntity()->getUserAgent()
                )
            );

            try
            {
                $json["user_data"]["jobtitle"] = $this->getJobTitleEntity()->getJobTitle();
            }
            catch(\Exception $e){
                $json["user_data"]["jobtitle"] = null;
            };

            try
            {
                $json["user_data"]["comments"] = $this->getCommentEntity()->getComment();
            }
            catch(\Exception $e){
                $json["user_data"]["comments"] = null;
            };

            return $json;
        }

    }