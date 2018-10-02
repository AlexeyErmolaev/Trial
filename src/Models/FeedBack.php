<?php
    /**
     * User: GothicPrince
     * Date: 31.05.2016
     * Time: 12:23
     */
    namespace Armor\Trial\Models;

    use Armor\Trial\Entity\FeedBack\DataFeedBackEntity;
    use Doctrine\ORM\EntityManager;

    class FeedBack
    {
        /**
         * @var EntityManager
         */
        protected $em;
        /**
         * FeedBack constructor.
         * @param EntityManager $em
         */
        public function __construct ( EntityManager $em )
        {
            $this->em = $em;
        }
        /**
         * @param DataFeedBackEntity $feedBackEntity
         * @return int
         */
        public function save(DataFeedBackEntity $feedBackEntity)
        {
            $this->em->persist($feedBackEntity);
            $this->em->flush();
            return $feedBackEntity->getDataBasicEntity()->getId();
        }
    }