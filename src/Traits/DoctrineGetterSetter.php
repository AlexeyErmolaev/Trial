<?php
    namespace Armor\Trial\Traits;

    use Doctrine\ORM\EntityManager;
    trait DoctrineGetterSetter
    {
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
         * @param EntityManager $entityManager
         * @return $this
         */
        public function setEntityManager ( EntityManager $entityManager )
        {
            $this->entityManager = $entityManager;
            return $this;
        }
    }