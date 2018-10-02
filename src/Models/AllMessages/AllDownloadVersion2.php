<?php
    namespace Armor\Trial\Models\AllMessages;

    use Armor\Trial\Entity\DataBasic\DataBasicEntity;
    use Armor\Trial\Entity\DataType\DataTypeMessageEntity;
    use Armor\Trial\Entity\Download\DownloadEntityInterface;
    use Armor\Trial\Entity\ServerType\DataServerTypeEntity;
    use Armor\Trial\Interfaces\AllMessagesInterface;
    use Doctrine\ORM\EntityRepository;

    class AllDownloadVersion2 implements AllMessagesInterface
    {
        /**
         * @param                  $status
         * @param EntityRepository $repository
         * @return DownloadEntityInterface[]
         */
        public function all ( $status, EntityRepository $repository )
        {

            $query = $repository
                ->createQueryBuilder("P")
                ->select()
                ->join(DataBasicEntity::class, "B", "WITH", "B.id = P.data_id")
                ->leftJoin(DataTypeMessageEntity::class, "T", "WITH", "T.data_id = P.data_id")
                ->leftJoin(DataServerTypeEntity::class, "S", "WITH", "S.data_id = P.data_id")
                ->where("B.status != :status")
                ->andWhere("T.data_id IS NULL")
                ->andWhere("S.data_id IS NULL")

                //->andWhere("T.database_name != ''")
                //->andWhere("U.user_email NOT IN(SELECT E.email FROM " . BlackListEntity::class . " E)")
                ->orderBy("B.created_at", "DESC")
                ->setParameter("status", $status, \Doctrine\DBAL\Types\Type::STRING)
                ->getQuery();

            $result = $query->getResult();
            if ($result != null)
                return $result;
            return [];
        }
    }