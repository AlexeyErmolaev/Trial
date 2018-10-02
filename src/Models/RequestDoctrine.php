<?php
    namespace Armor\Trial\Models;
    use app\Entities\BlackListEntity;
    use Armor\Trial\Entity\Purchase\PurchaseEntityInterface;
    use ArmorInc\MailContentManager\Models\ContentManagerTwig;
    use Doctrine\ORM\EntityManager;
    use GothicPrince\Mail\Mail;
    use GothicPrince\UserLog\Models\UserLogGetMethod;
    use Twig_Environment;
    use Twig_Loader_Filesystem;

    class RequestDoctrine
    {
        /**
         * @var PurchaseEntityInterface
         */
        protected $request;
        /**
         * @var EntityManager
         */
        protected $entityManager;


        /**
         * @return EntityManager
         */
        public function getEntityManager ()
        {
            return $this->entityManager;
        }

        /**
         * TrialDoctrine constructor.
         * @param EntityManager   $entityManager
         */

        public function __construct ( EntityManager $entityManager )
        {
            $this->entityManager = $entityManager;
        }


        /**
         * @return PurchaseEntityInterface
         */
        public function getRequest ()
        {
            return $this->request;
        }

        /**
         * @param PurchaseEntityInterface $request
         */
        public function setRequest ( $request )
        {
            $this->request = $request;
        }

        /**
         * @return int
         */
        public function save ()
        {
            $this->getEntityManager()->persist($this->getRequest());
            $this->getEntityManager()->flush();
            return $this->getRequest()->getDataBasicEntity()->getId();
        }

        public function send()
        {
            $Notice = new Mail();
            $Notice->Accessor();
            $Notice->setFrom("webserver@dataarmor.ru", $this->getRequest()->getDataUserEntity()->getUserName());
            $Notice->Subject = "DataArmor: Заявка менеджеру";

            $contentManager = new ContentManagerTwig($this->getRequest(), "Purchase");
            $contentManager
                ->setLang($contentManager::LANG_RU);
            $content = $contentManager->getContent();


            $Notice->AltBody = $content;
            $Notice->Body    = $content;
            $Notice->isHTML(true);

            if ($Notice->send())
            {
                $this->getRequest()->getDataBasicEntity()->setStatus(1);
                return true;
            }
            return false;
        }

    }