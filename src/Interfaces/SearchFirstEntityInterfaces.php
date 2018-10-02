<?php
    namespace Armor\Trial\Interfaces;

    interface SearchFirstEntityInterfaces
    {
        /**
         * @param int $status
         * @return object|null
         */
        public function getFirstEntityByStatus($status);

        /**
         * @return object|null
         */
        public function getFirstEntity();
    }