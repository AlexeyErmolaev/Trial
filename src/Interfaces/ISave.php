<?php
    /**
     * User: GothicPrince
     * Date: 31.05.2016
     * Time: 16:59
     */

    namespace Armor\Trial\Interfaces;

    interface ISave
    {
        /**
         * @param IValidation $validation
         * @return int
         */
        public function save(IValidation $validation);
    }