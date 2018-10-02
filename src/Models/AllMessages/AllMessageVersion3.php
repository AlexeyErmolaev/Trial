<?php
    namespace Armor\Trial\Models\AllMessages;
    use Armor\Trial\Entity\DataBasic\DataBasicEntity;
    use Armor\Trial\Entity\Download\DownloadEntity;
    use Armor\Trial\Entity\Download\GettingKeyEntity;
    use Armor\Trial\Entity\FeedBack\DataFeedBackEntity;
    use Armor\Trial\Entity\Purchase\PurchaseEntity;
    use Armor\Trial\Entity\Support\SupportEntity;
    use Armor\Trial\Interfaces\AllMessagesInterface;
    use Doctrine\ORM\EntityRepository;

    class AllMessageVersion3 implements AllMessagesInterface
    {
        public function all ( $status, EntityRepository $repository )
        {
            /**
             * @var DownloadEntity|GettingKeyEntity|DataFeedBackEntity|SupportEntity|PurchaseEntity $className
             */

            $className = $repository->getClassName();
            $query = $repository
                ->createQueryBuilder("T")
                ->from(DataBasicEntity::class, "B")
                ->where("B.status != :status")
                ->andWhere("T.type = :type")
                ->andWhere("B.id = T.data_id")
                ->setParameter("status", $status, \Doctrine\DBAL\Types\Type::STRING)
                ->setParameter("type", $className::TYPE, \Doctrine\DBAL\Types\Type::INTEGER)
                ->orderBy("B.created_at", "DESC")
                ->getQuery();

            //echo $query->getSQL();
            $result = $query->getResult();;

            if ($result != null)
                return $result;
            return null;
        }
    }