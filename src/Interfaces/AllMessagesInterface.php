<?php
    namespace Armor\Trial\Interfaces;
    use Doctrine\ORM\EntityRepository;

    interface AllMessagesInterface
    {
        public function all($status, EntityRepository $repository);
    }