<?php
    namespace Armor\Trial\Entity\Download;
    use Armor\Trial\Entity\Comments\DataCommentsTrait;
    use Armor\Trial\Entity\DataBasic\DataBasicEntity;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use Armor\Trial\Entity\DataInfo\DataInfoTrait;
    use Armor\Trial\Entity\DataType\DataTypeEntityInterface;
    use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
    use Armor\Trial\Entity\DataUser\DataUserTrait;
    use Armor\Trial\Entity\JobTitle\DataJobTitleTrait;
    use Armor\Trial\Entity\License\DataLicenseEntityTrait;
    use Armor\Trial\Entity\LogActions\DataLogsActionTrait;
    use Armor\Trial\Entity\Product\ProductEntity;
    use Armor\Trial\Entity\Product\ProductTrait;
    use Armor\Trial\Entity\ServerType\DataServerTypeTrait;
    use JsonSerializable;
    use WhichBrowser\Parser;

    /**
     * @Entity
     * @Table(name="data_trial")
     */
    class DownloadWithOutTypeEntity extends ProductEntity implements DownloadEntityInterface, JsonSerializable
    {
        use DataServerTypeTrait;
        use DataJobTitleTrait;
        use DataUserTrait;
        use DataInfoTrait;
        use DataCommentsTrait;
        use ProductTrait;
        use DataLogsActionTrait;
        use DataLicenseEntityTrait;
        use DataBasicTrait;

        protected $type;
        public function setType ( $type )
        {
            $this->type = $type;
        }

        public function getType ()
        {
            return $this->type;
        }


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
                "version"=>2,
                "logs"=>$logs,
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
                    "db"=>$this->getProductEntity()->getDatabaseName(),
                    "os"=>$this->getProductEntity()->getOperatingSystem(),
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
                $json["user_data"]["server"] = $this->getServerTypeEntity()->getServerType();
            }
            catch(\Exception $e){
                $json["user_data"]["server"] = null;
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