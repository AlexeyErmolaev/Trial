<?php
    namespace Armor\Trial\Models;

    use Armor\Trial\Entity\DataBasic\DataBasicEntity;
    use Armor\Trial\Interfaces\SearchFirstEntityInterfaces;
    use Doctrine\ORM\EntityRepository;

    class SearchFirstEntityDoctrine implements SearchFirstEntityInterfaces
    {
        /**
         * @var EntityRepository
         */
        protected $repository;

        /**
         * @var string
         */
        protected $classNameEntity;

        /**
         * @var int
         */
        protected $type;

        public function __construct ( EntityRepository $repository, $classNameEntity, $type )
        {
            $this->repository = $repository;
            $this->classNameEntity = $classNameEntity;
            $this->type = $type;
        }

        /**
         * @return EntityRepository
         */
        protected function getRepository ()
        {
            return $this->repository;
        }

        /**
         * @return int
         */
        protected function getType ()
        {
            return $this->type;
        }


        /**
         * @return \Doctrine\ORM\QueryBuilder
         */
        protected function getQueryBuilder()
        {
            return $this->getRepository()
                ->createQueryBuilder("T")
                ->from(DataBasicEntity::class, "B")
                ->where("B.id = T.data_id")
                ->andWhere("T.type = :type")
                ->setParameter("type", $this->getType());
        }

        /**
         * @param int $status
         * @return null|object
         */
        public function getFirstEntityByStatus($status)
        {
            $status = (string) $status;
            $query = $this->getQueryBuilder()
                ->andWhere("B.status = :status")
                ->setParameter("status", $status)
                ->setMaxResults(1)
                ->getQuery();
            $result = $query->getResult();
            if ($result === [])
                return null;
            return $result[0];
        }

        /**
         * @return object|null
         */
        public function getFirstEntity ()
        {
            $query = $this->getQueryBuilder()
                ->setMaxResults(1)
                ->getQuery();
            $result = $query->getResult();
            if ($result === [])
                return null;
            return $result[0];
        }
    }