<?php
namespace Armor\Trial\Models\GetOneMessage;

use Armor\Trial\Entity\DataBasic\DataBasicEntity;
use Armor\Trial\Entity\Download\DownloadEntity;
use Armor\Trial\Entity\Download\GettingKeyEntity;
use Armor\Trial\Entity\FeedBack\DataFeedBackEntity;
use Armor\Trial\Entity\Purchase\PurchaseEntity;
use Armor\Trial\Entity\Support\SupportEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\DBAL\Types\Type;

class GetOneMessageVersion3
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager ()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager ( EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param                  $id
     * @param EntityRepository $repository
     * @return Object|null
     */
    public function getById($id, EntityRepository $repository)
    {

        /**
         * @var DownloadEntity|GettingKeyEntity|DataFeedBackEntity|SupportEntity|PurchaseEntity $className
         */

        $className = $repository->getClassName();
        $query = $repository
            ->createQueryBuilder("T")
            ->from(DataBasicEntity::class, "B")
            ->where("T.type = :type")
            ->andWhere("T.data_id = :id")
            ->andWhere("B.id = T.data_id")

            ->setParameter("id", $id)
            ->setParameter("type", $className::TYPE)
            ->setMaxResults(1)
            ->getQuery();

        //echo $query->getSQL();
        $result = $query->getResult();
        //echo count($result);
        if (count($result) != 0)
            return $result[0];
        return null;
    }
} 