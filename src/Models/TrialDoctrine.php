<?php
    namespace Armor\Trial\Models;
    use app\Entities\BlackListEntity;
    use Armor\Trial\abstractions\abstractModelDoctrine;
    use Armor\Trial\Entity\DataBasic\DataBasicEntity;
    use Armor\Trial\Entity\Download\DownloadEntity;
    use Armor\Trial\Entity\Download\DownloadEntityInterface;
    use Armor\Trial\Entity\Download\GettingKeyEntity;
    use Armor\Trial\Entity\Product\ProductEntityInterface;
    use Armor\Trial\Interfaces\IValidation;
    use Armor\Trial\Models\AllMessages\AllDownloadVersion2;
    use Armor\Trial\Models\AllMessages\AllGettingKeyVersion2;
    use Armor\Trial\Models\AllMessages\AllMessageVersion3;
    use Doctrine\ORM\EntityRepository;

    class TrialDoctrine extends abstractModelDoctrine
    {
        /**
         * @var DownloadEntityInterface
         */
        public $trialEntity;

        /**
         * @param IValidation $validation
         * @return int
         */
        public function save ( IValidation $validation )
        {
            if ($validation->isValid())
            {
                $this->getEntityManager()->persist($this->trialEntity);
                $this->getEntityManager()->flush();
            }
            return $this->trialEntity->getDataBasicEntity()->getId();
        }

        /**
         * @param string           $status
         * @param EntityRepository $repository
         * @return DownloadEntityInterface|GettingKeyEntity|null
         */
        public function getEntity($status = "0", EntityRepository $repository)
        {
            $classNameEntity = $repository->getClassName();
            /**
             * @var DownloadEntity|GettingKeyEntity $classNameEntity
             */
            $model = new SearchFirstEntityDoctrine
            (
                $repository,
                $classNameEntity,
                $classNameEntity::TYPE
            );
            return $model->getFirstEntityByStatus($status);
        }

        /**
         * @param                  $status
         * @param bool             $getting
         * @param EntityRepository $repository
         * @return DownloadEntityInterface[]
         */
        public function getAllProductsVersion2($status, $getting = false, EntityRepository $repository)
        {
            //$this->getEntityManager()->getRepository(DownloadWithOutTypeEntity::class)
            if (!$getting)
                $model = new AllDownloadVersion2();
            else
                $model = new AllGettingKeyVersion2();
            return $model->all($status, $repository);
        }


        /**
         * @param int              $status
         * @param EntityRepository $repository
         * @return ProductEntityInterface[]
         */
        public function getAllProductsVersion3($status, EntityRepository $repository)
        {
            //EntityRepository
            //$classNameEntity = DownloadEntity::class
            //$this->getEntityManager()->getRepository($classNameEntity)
            $model = new AllMessageVersion3();
            $result = $model->all($status, $repository);
            if ($result === null)
                return [];
            return $result;
        }

        /**
         * @param                  $id
         * @param EntityRepository $repository
         * @return DownloadEntityInterface[]
         */
        public function findById($id, EntityRepository $repository)
        {
            //$repository = $this->getEntityManager()
            //    ->getRepository(DownloadEntity::class);

            return $repository->createQueryBuilder("T")
                ->from(DataBasicEntity::class, "B")
                ->where("B.id = :id")
                ->setParameter("id", $id)
                ->andWhere("B.id = T.data_id")
                ->setMaxResults(1)
                ->getQuery()
                ->getResult();
        }
    }