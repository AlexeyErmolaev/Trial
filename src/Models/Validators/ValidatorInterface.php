<?php
namespace Armor\Trial\Models\Validators;

interface ValidatorInterface
{
    /**
     * @param $value
     * @return bool
     */
    public function validation($value);
}