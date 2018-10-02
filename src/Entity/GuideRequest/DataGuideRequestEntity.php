<?php
namespace Armor\Trial\Entity\GuideRequest;


use Armor\Trial\Entity\Comments\DataCommentsTrait;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;
use Armor\Trial\Entity\DataInfo\DataInfoTrait;
use Armor\Trial\Entity\DataType\DataTypeEntityTrait;
use Armor\Trial\Entity\DataUser\DataUserTrait;
use Armor\Trial\Entity\JobTitle\DataJobTitleTrait;
use Armor\Trial\Entity\LogActions\DataLogsActionTrait;
use JsonSerializable;
use WhichBrowser\Parser;

/**
 * @Entity
 * @Table(name="data_type")
 */
class DataGuideRequestEntity implements DataGuideRequestEntityInterface, JsonSerializable
{
    use DataJobTitleTrait;
    use DataInfoTrait;
    use DataUserTrait;
    use DataLogsActionTrait;
    use DataTypeEntityTrait;
    use DataFileNameTrait;
    use DataCommentsTrait;
    use DataBasicTrait;

    const TYPE = self::TYPE_GUIDE;

    public function __construct ()
    {
        $this->setType(self::TYPE);

    }

    function jsonSerialize()
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
                "userAgent"=>$this->getDataBasicEntity()->getUserAgent()
            )
        );

        try
        {
            $json["user_data"]["email"] = $this->getDataUserEntity()->getUserEmail();
        }
        catch(\Exception $e){
            $json["user_data"]["email"] = null;
        };

        try
        {
            $json["user_data"]["name"] = $this->getDataUserEntity()->getUserName();
        }
        catch(\Exception $e){
            $json["user_data"]["name"] = null;
        };

        try
        {
            $json["user_data"]["company"] = $this->getUserInfoEntity()->getCompany();
        }
        catch(\Exception $e){
            $json["user_data"]["company"] = null;
        };

        try
        {
            $json["user_data"]["country"] = $this->getUserInfoEntity()->getCountry();
        }
        catch(\Exception $e){
            $json["user_data"]["country"] = null;
        };

        try
        {
            $json["user_data"]["phone"] = $this->getUserInfoEntity()->getPhone();
        }
        catch(\Exception $e){
            $json["user_data"]["phone"] = null;
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
            $json["user_data"]["comments"] = $this->getCommentEntity()->getComment();
        }
        catch(\Exception $e){
            $json["user_data"]["comments"] = null;
        };

        try
        {
            $json["user_data"]["filename"] = $this->getFileNameEntity()->getFileName();
        }
        catch(\Exception $e){
            $json["user_data"]["filename"] = null;
        };



        return $json;
    }
}