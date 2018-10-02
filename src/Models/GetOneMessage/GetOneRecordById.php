<?php
    namespace Armor\Trial\Models\GetOneMessage;

    use Armor\Trial\Entity\Download\DownloadEntity;
    use Armor\Trial\Entity\Download\GettingKeyEntity;
    use Armor\Trial\Entity\FeedBack\DataFeedBackEntity;
    use Armor\Trial\Entity\Purchase\PurchaseEntity;
    use Armor\Trial\Entity\Support\SupportEntity;
    use Doctrine\ORM\EntityManager;

    class GetOneRecordById implements GetOneRecordByIdInterface
    {
        /**
         * @var string
         */
        protected $entityClassName;

        /**
         * @var EntityManager
         */
        protected $entityManager;

        /**
         * @return EntityManager
         */
        protected function getEntityManager ()
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
         * @return string
         */
        protected function getEntityClassName ()
        {
            return $this->entityClassName;
        }

        /**
         * @param string $entityClassName
         */
        public function setEntityClassName ( $entityClassName )
        {
            $this->entityClassName = $entityClassName;
        }

        /**
         * @param $id
         * @return DownloadEntity|GettingKeyEntity|DataFeedBackEntity|SupportEntity|PurchaseEntity
         */
        public function getRecordById ( $id )
        {
            $getterRecordModel = new GetOneMessageVersion3();
            $getterRecordModel->setEntityManager($this->getEntityManager());
            $repository = $this->getEntityManager()->getRepository($this->getEntityClassName());
            return $getterRecordModel->getById($id, $repository);
        }
    }