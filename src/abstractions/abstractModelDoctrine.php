<?php
    namespace Armor\Trial\abstractions;
    use Armor\Trial\Interfaces\IModel;
    use Doctrine\ORM\EntityManagerInterface;

    abstract class abstractModelDoctrine implements IModel
    {
        /**
         * @var EntityManagerInterface
         */
        private $entityManager;

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
    }