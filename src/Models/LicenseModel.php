<?php
namespace Armor\Trial\Models;
use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
use Armor\Trial\Entity\DataUser\DataUserEntity;
use Armor\Trial\Entity\Download\LicenseGeneratedEntity;
use Armor\Trial\Entity\License\DataLicenseEntity;
use Armor\Trial\Entity\Product\ProductEntity;
use DateTime;
use Doctrine\ORM\EntityManager;
use gafarov\KeyGenerator\Entity\KeyGeneratorEntity;
use gafarov\KeyGenerator\Models\KeyGenerator;

class LicenseModel
{
    public function create
    (
        EntityManager $em,
        DataBasicEntityInterface $basicEntity,
        DateTime $date,
        $customer,
        $os,
        $licenseType = DataLicenseEntity::TRIAL_LICENSE_TYPE,
        $db = "",
        $username = ""
    ){
        $licenseType = intval($licenseType);
        if (($licenseType !== DataLicenseEntity::TRIAL_LICENSE_TYPE) and ($licenseType !== DataLicenseEntity::TERM_LICENSE_TYPE) and ($licenseType !== DataLicenseEntity::PERMANENT_LICENSE_TYPE)) {
            throw new \Exception("TypeLicense is not valid" . $licenseType);
        }
        $keyGenEntity = new KeyGeneratorEntity();
        $keyGenEntity
            ->setServer(KeyGenerator::SERVER_NONE)
            ->setCustomer($customer)
            ->setOperatingSystem($os)
            ->setTypeKey($licenseType)
            ->setTime($date);


        $keyGenModel = new KeyGenerator($keyGenEntity);
        $code = $keyGenModel->createLicense();
        $keyGenModel->deleteLicense();

        $userEntity = new DataUserEntity();
        $userEntity
            ->setUserName($username)
            ->setDataBasicEntity($basicEntity)
            ->setUserEmail($customer);

        $licenseEntity = new DataLicenseEntity();
        $licenseEntity
            ->setDataBasicEntity($basicEntity)
            ->setDuration($date)
            ->setLicenseType($licenseType)
            ->setKeyActivation($code);

        $productEntity = new ProductEntity();
        $productEntity
            ->setDatabaseName($db)
            ->setDataBasicEntity($basicEntity)
            ->setOperatingSystem($os);

        $licenseManager = new LicenseGeneratedEntity();
        $licenseManager
            ->setDataBasicEntity($basicEntity)
            ->setDataUserEntity($userEntity)
            ->setLicenseEntity($licenseEntity)
            ->setProductEntity($productEntity);

        $em->persist($licenseManager);
        $em->flush();
        return $licenseManager;
    }
}