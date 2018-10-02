<?php
    namespace Armor\Trial;
    use Armor\Trial\Entity\Download\DownloadEntity;
    use Armor\Trial\Entity\Download\GettingKeyEntity;
    use Armor\Trial\Entity\FeedBack\DataFeedBackEntity;
    use Armor\Trial\Entity\Purchase\PurchaseEntity;
    use Armor\Trial\Models\Save\SaveEntityModel;
    use Armor\Trial\Models\Save\SaveModelInterface;
    use Doctrine\ORM\EntityManagerInterface;
    use PHPUnit_Framework_MockObject_MockObject;

    class SaveEntityModelTest extends \PHPUnit_Framework_TestCase
    {
        public function testMockSaveFalse()
        {
            /**
             * @var $model PHPUnit_Framework_MockObject_MockObject|SaveModelInterface
             */
            $model = $this->getMock(SaveModelInterface::class);
            $model->method("save")->willReturn(false);

            $this->assertFalse($model->save());

        }

        public function testDownload()
        {
            $ip = "127.0.0";
            $userAgent = "";
            $os = "Linux";
            $db = "PostgreSQL";
            $email = "email@email.com";
            $name = "MyName";
            $company = "MyCompany";
            $country = "MyCountry";
            $phone = "37462374234";
            $job = "Manager";
            $comments = "No comments";

            $entityManager = $this->getMock(EntityManagerInterface::class);
            /**
             * @var $entityManager EntityManagerInterface
             */


            $downloadEntity = new DownloadEntity();
            $modelDownload = new SaveEntityModel($entityManager, $downloadEntity);

            $modelDownload->setBasic(new \DateTime(), $ip, $userAgent, 0, 100);
            $modelDownload->setProduct($os, $db);
            $modelDownload->setDataUser($email, $name);
            $modelDownload->setDataInfo($company, $country, $phone);
            $modelDownload->setJobTitle($job);
            $modelDownload->setLog([]);
            $modelDownload->setComment($comments);
            $this->assertTrue($modelDownload->save());

            $getKeyEntity = new GettingKeyEntity();
            $modelGetKey = new SaveEntityModel($entityManager, $getKeyEntity);
            $modelGetKey->setBasic(new \DateTime(), $ip, $userAgent, 0, 101);
            $modelGetKey->setProduct($os, $db);
            $modelGetKey->setDataUser($email, $name);
            $modelGetKey->setDataInfo($company, $country, $phone);
            $modelGetKey->setJobTitle($job);
            $modelGetKey->setLog([]);
            $modelGetKey->setComment($comments);
            $modelGetKey->setServerType("AWS");
            $this->assertTrue($modelGetKey->save());

            $feedBackEntity = new DataFeedBackEntity();
            $feedBackModel = new SaveEntityModel($entityManager, $feedBackEntity);
            $feedBackModel->setBasic(new \DateTime(), $ip, $userAgent, 0);
            $feedBackModel->setDataUser($email, $name);
            $feedBackModel->setDataInfo($company, $country, $phone);
            $feedBackModel->setJobTitle($job);
            $feedBackModel->setLog([]);
            $feedBackModel->setComment($comments);
            $feedBackModel->setTheme("No theme");
            $this->assertFalse($feedBackModel->save());


            $purchaseEntity = new PurchaseEntity();
            $modelPurchase = new SaveEntityModel($entityManager, $purchaseEntity);
            $modelPurchase->setBasic(new \DateTime(), $ip, $userAgent, 0);
            $modelPurchase->setDataUser($email, $name);
            $modelPurchase->setDataInfo($company, $country, $phone);
            $modelPurchase->setJobTitle($job);
            $modelPurchase->setLog([]);
            $modelPurchase->setComment($comments);
            $this->assertFalse($modelPurchase->save());

        }
    }