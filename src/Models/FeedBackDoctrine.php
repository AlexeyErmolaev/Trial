<?php
    namespace Armor\Trial\Models;
    use app\Entities\BlackListEntity;
    use Armor\Trial\abstractions\abstractModelDoctrine;
    use Armor\Trial\Entity\FeedBack\DataFeedBackEntity;
    use Armor\Trial\Entity\FeedBack\DataFeedBackEntityInterface;
    use Armor\Trial\Interfaces\IValidation;
    use Armor\Trial\Models\AllMessages\AllMessageVersion3;
    use Doctrine\ORM\EntityRepository;

    class FeedBackDoctrine extends abstractModelDoctrine
    {
        /**
         * @var DataFeedBackEntityInterface
         */
        public $feedBackEntity;
        /**
         * @param IValidation $validation
         * @return int
         */
        public function save ( IValidation $validation )
        {
            if ($validation->isValid())
            {
                $this->getEntityManager()->persist($this->feedBackEntity);
                $this->getEntityManager()->flush();
            }
            return $this->feedBackEntity->getDataBasicEntity()->getId();
        }

        /**
         * @param string           $status
         * @param EntityRepository $repository
         * @return DataFeedBackEntityInterface|null
         */
        public function get($status = "0", EntityRepository $repository)
        {
            /**
             * @var $className DataFeedBackEntity
             */
            $className = $repository->getClassName();
            $model = new SearchFirstEntityDoctrine
            (
                $repository,
                $className,
                $className::TYPE
            );
            return $model->getFirstEntityByStatus($status);
        }

        /**
         * @return DataFeedBackEntityInterface[]
         */
        public function getEntities()
        {
            //$this->getEntityManager()->getRepository(DataFeedBackEntity::class)
            $model = new AllMessageVersion3();
            $result = $model->all(2, $this->getEntityManager()->getRepository(DataFeedBackEntity::class));
            if ($result === null)
                return [];
            return $result;
        }

    }