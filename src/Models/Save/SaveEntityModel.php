<?php
namespace Armor\Trial\Models\Save;
use Armor\Trial\Entity\Comments\DataCommentsEntity;
use Armor\Trial\Entity\Comments\GetDataCommentsEntityInterface;
use Armor\Trial\Entity\Comments\GetSetDataCommentsEntityInterface;
use Armor\Trial\Entity\DataBasic\DataBasicEntity;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;
use Armor\Trial\Entity\DataInfo\DataInfoEntity;
use Armor\Trial\Entity\DataInfo\GetDataInfoEntityInterface;
use Armor\Trial\Entity\DataInfo\GetSetDataInfoEntityInterface;
use Armor\Trial\Entity\DataUser\DataUserEntity;
use Armor\Trial\Entity\DataUser\GetDataUserEntityInterface;
use Armor\Trial\Entity\DataUser\GetSetDataUserEntityInterface;
use Armor\Trial\Entity\GuideRequest\DataFileNameEntity;
use Armor\Trial\Entity\GuideRequest\GetSetDataFileNameEntityInterface;
use Armor\Trial\Entity\JobTitle\DataJobTitleEntity;
use Armor\Trial\Entity\JobTitle\GetDataJobTitleEntityInterface;
use Armor\Trial\Entity\JobTitle\GetSetDataJobTitleEntityInterface;
use Armor\Trial\Entity\License\DataLicenseEntity;
use Armor\Trial\Entity\License\GetSetDataLicenseEntity;
use Armor\Trial\Entity\LogActions\DataLogsActionEntity;
use Armor\Trial\Entity\LogActions\GetSetLogsActionEntityInterface;
use Armor\Trial\Entity\Product\GetSetProductEntityInterface;
use Armor\Trial\Entity\Product\ProductEntity;
use Armor\Trial\Entity\ServerType\DataServerTypeEntity;
use Armor\Trial\Entity\ServerType\GetSetServerTypeEntityInterface;
use Armor\Trial\Entity\Theme\DataThemeEntity;
use Armor\Trial\Entity\Theme\GetSetDataThemeEntityInterface;
use Armor\Trial\Exceptions\EntityIsNotImplementedInterface;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use GothicPrince\UserLog\Models\ILog;

class SaveEntityModel implements SaveModelInterface, SaveModelSetterInterface
{
    /**
     * @return bool
     */
    public function save()
    {
        $this->getEntityManager()->persist($this->getEntity());
        $this->getEntityManager()->flush();
        if ($this->getEntity()->getDataBasicEntity()->getId() > 0)
            return true;
        return false;
    }

    function __construct ( EntityManagerInterface $em, GetDataBasicEntityInterface $entity )
    {

        $this->em = $em;
        $this->entity = $entity;
    }

    /**
     * @param DateTime $date
     * @param          $ip
     * @param          $userAgent
     * @param          $status
     * @param null     $id
     * @return $this
     */
    public function setBasic(\DateTime $date, $ip, $userAgent, $status, $id = null)
    {

        $entity = $this->getEntity();
        $basicEntity = $entity->getDataBasicEntity();
        if ($basicEntity === null)
            $basicEntity = new DataBasicEntity();

        $basicEntity->setCreatedAt($date);
        $basicEntity->setIp($ip);
        $basicEntity->setStatus($status);
        $basicEntity->setUserAgent($userAgent);

        if ($id !== null)
            $basicEntity->setId($id);

        if ($entity instanceof SetDataBasicEntityInterface)
            $entity->setDataBasicEntity($basicEntity);
        return $this;
    }

    /**
     * @param $logs ILog[]
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setLog($logs)
    {
        $entity = $this->getEntity();


        if ($entity instanceof GetSetLogsActionEntityInterface)
        {
            $logEntity = $entity->getLogActionEntity();
            if ($logEntity === null)
            {
                $logEntity = new DataLogsActionEntity();
                $entity->setLogActionEntity($logEntity);
            }
            $logEntity->setDataBasicEntity($entity->getDataBasicEntity());
            $logEntity->setSerializeLog($logs);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetSetLogsActionEntityInterface::class);
    }

    /**
     * @param $os
     * @param $db
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setProduct($os, $db)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetProductEntityInterface)
        {
            $productEntity = $entity->getProductEntity();
            if ($productEntity === null)
            {
                $productEntity = new ProductEntity();
                $entity->setProductEntity($productEntity);
            }

            $productEntity->setDataBasicEntity($entity->getDataBasicEntity());
            $productEntity->setDatabaseName($db);
            $productEntity->setOperatingSystem($os);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetSetProductEntityInterface::class);
    }

    /**
     * @param $theme
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setTheme($theme)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetDataThemeEntityInterface)
        {
            $themeEntity = $entity->getThemeEntity();
            if ($themeEntity === null)
            {
                $themeEntity = new DataThemeEntity();
                $entity->setThemeEntity($themeEntity);
            }
            $themeEntity->setDataBasicEntity($entity->getDataBasicEntity());
            $themeEntity->setTheme($theme);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetSetDataThemeEntityInterface::class);
    }

    /**
     * @param $organization
     * @param $country
     * @param $phone
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setDataInfo($organization, $country, $phone)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetDataInfoEntityInterface)
        {

            $infoEntity = $entity->getUserInfoEntity();
            if ($infoEntity === null)
            {
                $infoEntity = new DataInfoEntity();
                $entity->setUserInfoEntity($infoEntity);
            }
            $infoEntity->setCompany($organization);
            $infoEntity->setCountry($country);
            $infoEntity->setPhone($phone);
            $infoEntity->setDataBasicEntity($this->getEntity()->getDataBasicEntity());
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetDataInfoEntityInterface::class);
    }

    /**
     * @param $email
     * @param $name
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setDataUser($email, $name)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetDataUserEntityInterface)
        {
            $userEntity = $entity->getDataUserEntity();
            if ($userEntity === null)
            {
                $userEntity = new DataUserEntity();
                $entity->setDataUserEntity($userEntity);
            }
            $userEntity->setDataBasicEntity($this->getEntity()->getDataBasicEntity());
            $userEntity->setUserEmail($email);
            $userEntity->setUserName($name);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetDataUserEntityInterface::class);
    }

    /**
     * @param $comment
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setComment($comment)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetDataCommentsEntityInterface)
        {
            $commentEntity = $entity->getCommentEntity();
            if ($commentEntity === null)
            {
                $commentEntity = new DataCommentsEntity();
                $entity->setCommentEntity($commentEntity);
            }

            $commentEntity
                ->setDataBasicEntity($entity->getDataBasicEntity())
                ->setComment($comment);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetDataCommentsEntityInterface::class);
    }

    /**
     * @param $jobTitle
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setJobTitle($jobTitle)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetDataJobTitleEntityInterface)
        {
            $jobEntity = $entity->getJobTitleEntity();
            if ($jobEntity === null)
            {
                $jobEntity = new DataJobTitleEntity();
                $entity->setJobTitleEntity($jobEntity);
            }
            $jobEntity->setDataBasicEntity($this->getEntity()->getDataBasicEntity());
            $jobEntity->setJobTitle($jobTitle);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetDataJobTitleEntityInterface::class);
    }

    /**
     * @param $serverType
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setServerType($serverType)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetServerTypeEntityInterface)
        {
            $serverEntity = $entity->getServerTypeEntity();
            if ($serverEntity === null)
            {
                $serverEntity = new DataServerTypeEntity();
                $entity->setServerTypeEntity($serverEntity);
            }
            $serverEntity->setDataBasicEntity($entity->getDataBasicEntity());
            $serverEntity->setServerType($serverType);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetSetServerTypeEntityInterface::class);
    }

    /**
     * @param DateTime $duration
     * @param string $code
     * @param int $licenseType
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setLicense(DateTime $duration, $code, $licenseType)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetDataLicenseEntity)
        {
            $licenseEntity = $entity->getLicenseEntity();

            if ($licenseEntity === null)
            {
                $licenseEntity = new DataLicenseEntity();
                $entity
                    ->setLicenseEntity($licenseEntity);
            }
            $licenseEntity->setDataBasicEntity($entity->getDataBasicEntity());
            $licenseEntity->setDuration($duration);
            $licenseEntity->setKeyActivation($code);
            $licenseEntity->setLicenseType($licenseType);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetSetDataLicenseEntity::class);
    }

    /**
     * @param $fileName
     * @return $this
     * @throws EntityIsNotImplementedInterface
     */
    public function setFileName($fileName)
    {
        $entity = $this->getEntity();
        if ($entity instanceof GetSetDataFileNameEntityInterface)
        {
            $fileNameEntity = $entity->getFileNameEntity();

            if ($fileNameEntity === null)
            {
                $fileNameEntity = new DataFileNameEntity();

                $entity
                    ->setFileNameEntity($fileNameEntity);
            }
            $fileNameEntity->setDataBasicEntity($entity->getDataBasicEntity());
            $fileNameEntity->setFileName($fileName);
            return $this;
        }
        throw (new EntityIsNotImplementedInterface())->setType($entity, GetSetDataFileNameEntityInterface::class);
    }


    /**
     * @return GetDataBasicEntityInterface
     */
    protected function getEntity ()
    {
        return $this->entity;
    }

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager ()
    {
        return $this->em;
    }

    /**
     * @param GetDataBasicEntityInterface $entity
     */
    public function setEntity ( GetDataBasicEntityInterface $entity )
    {
        $this->entity = $entity;
    }

    /**
     * @var GetDataBasicEntityInterface
     */
    protected $entity;

    /**
     * @var EntityManagerInterface
     */
    protected $em;
} 