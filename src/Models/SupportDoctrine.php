<?php
    namespace Armor\Trial\Models;
    use Armor\Trial\Entity\Support\SupportEntity;
    use Armor\Trial\Entity\Support\SupportEntityInterface;
    use Armor\Trial\Models\AllMessages\AllMessageVersion3;
    use Armor\Trial\Traits\DoctrineGetterSetter;
    use ArmorInc\MailContentManager\Models\ContentManagerTwig;
    use Doctrine\ORM\EntityManager;
    use GothicPrince\Mail\Mail;

    class SupportDoctrine
    {
        /**
         * @var EntityManager
         */
        protected $entityManager;
        /**
         * @var SupportEntityInterface
         */
        protected $supportEntity;

        /**
         * @return SupportEntityInterface
         */
        public function getSupportEntity ()
        {
            return $this->supportEntity;
        }

        /**
         * @return EntityManager
         */
        public function getEntityManager ()
        {
            return $this->entityManager;
        }

        /**
         * @param EntityManager $entityManager
         * @return $this
         */
        public function setEntityManager ( EntityManager $entityManager )
        {
            $this->entityManager = $entityManager;
            return $this;
        }


        /**
         * @param SupportEntityInterface $supportEntity
         * @return $this
         */
        public function setSupportEntity ( SupportEntityInterface $supportEntity )
        {
            $this->supportEntity = $supportEntity;
            return $this;
        }


        /**
         * @return bool
         */
        protected function send()
        {
            return false;
        }

        /**
         * @return bool
         */
        public function save()
        {

            $contentManager = new ContentManagerTwig($this->getSupportEntity(), "Support");
            $contentManager
                ->setLang($contentManager::LANG_RU);
            $content = $contentManager->getContent();

            $Notice = new Mail();
            $Notice->Accessor();
            $Notice->setFrom("webserver@dataarmor.ru", $this->getSupportEntity()->getDataUserEntity()->getUserName());
            $Notice->Subject = "DataArmor: Техподдержка";

            $Notice->AltBody = $content;
            $Notice->Body    = $content;
            $Notice->isHTML(true);

            if ($Notice->send())
            {
                $this->getEntityManager()->persist($this->getSupportEntity());
                $this->getEntityManager()->flush();
                $this->getSupportEntity()->getDataBasicEntity()->setStatus(1);
                return true;
            }
            return false;
        }

        /**
         * @return SupportEntityInterface[]
         */
        public function getEntities()
        {
            $model = new AllMessageVersion3();
            $result = $model->all(2, $this->entityManager->getRepository(SupportEntity::class));
            if ($result === null)
                return [];
            return $result;
        }

        use DoctrineGetterSetter;
    }