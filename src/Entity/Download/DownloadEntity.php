<?php
    namespace Armor\Trial\Entity\Download;
    use Armor\Trial\Entity\Comments\DataCommentsTrait;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use Armor\Trial\Entity\DataInfo\DataInfoTrait;
    use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
    use Armor\Trial\Entity\DataUser\DataUserTrait;
    use Armor\Trial\Entity\GuideRequest\DataFileNameTrait;
    use Armor\Trial\Entity\GuideRequest\GetSetDataFileNameEntityInterface;
    use Armor\Trial\Entity\JobTitle\DataJobTitleTrait;
    use Armor\Trial\Entity\NewsletterSubscription\NewsletterSubscriptionTrait;
    use Armor\Trial\Entity\License\DataLicenseEntityTrait;
    use Armor\Trial\Entity\LogActions\DataLogsActionTrait;
    use Armor\Trial\Entity\Product\ProductTrait;
    use Armor\Trial\Entity\ServerType\DataServerTypeTrait;
    use JsonSerializable;
    use WhichBrowser\Parser;

    /**
     * @Entity
     * @Table(name="data_type")
     */
    class DownloadEntity implements DownloadEntityInterface, GetSetDataFileNameEntityInterface, JsonSerializable
    {
        const TYPE = self::TYPE_DOWNLOAD;
        use DataServerTypeTrait;
        use DataJobTitleTrait;
        use DataUserTrait;
        use DataInfoTrait;
        use DataCommentsTrait;
        use ProductTrait;
        use DataLogsActionTrait;
        use DataTypeEntityTrait;
        use DataLicenseEntityTrait;
        use DataFileNameTrait;
        use NewsletterSubscriptionTrait;
        use DataBasicTrait;


        public function __construct ()
        {
            $this->setType(self::TYPE);
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
                "version"=>3,
                "logs"=>$logs,
                "type"=>self::TYPE,
                "user_info"=>array(
                    "created"=>$this->getDataBasicEntity()->getCreatedAt(),
                    "ip"=>long2ip(intval($this->getDataBasicEntity()->getIp())),
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
                    "userAgent"=>$this->getDataBasicEntity()->getUserAgent()
                )
            );
            try
            {
                $days = intval(($this->getLicenseEntity()->getDuration()->getTimestamp() - time()) / 86400);
                if ($days < 0) {
                    $days = 0;
                }
                $json["license"] = [
                    "code" => $this->getLicenseEntity()->getKeyActivation(),
                    "days" => $days,
                    "duration" => $this->getLicenseEntity()->getDuration(),
                    "type"=>$this->getLicenseEntity()->getLicenseType()
                ];
            }
            catch(\Exception $e){};

            try
            {
                $json["user_info"]["license"] = $this->getLicenseEntity()->getDuration();
            }
            catch(\Exception $e){
                $json["user_info"]["license"] = null;
            };

            try
            {
                $json["user_data"]["jobtitle"] = $this->getJobTitleEntity()->getJobTitle();
            }
            catch(\Exception $e){
                $json["user_data"]["jobtitle"] = null;
            };

            try
            {
                if ($this->getServerTypeEntity() !== null) {
                    $json["user_data"]["server"] = $this->getServerTypeEntity()->getServerType();
                }
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