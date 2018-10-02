<?php
    /**
     * User: GothicPrince
     * Date: 31.05.2016
     * Time: 17:16
     */

    namespace Armor\Trial\Models;
    use Armor\Trial\Interfaces\IValidation;

    class Validator implements IValidation
    {
        /**
         * @return bool
         */
        public function isValid ()
        {
            return true;
        }
    }