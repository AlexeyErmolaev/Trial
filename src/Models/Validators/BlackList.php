<?php
namespace Armor\Trial\Models\Validators;


class BlackList implements ValidatorInterface
{
    protected $hosts = [];
    protected function getHosts()
    {
        return $this->hosts;
    }
    public function addHost($hosts)
    {
        $this->hosts[] = $hosts;
        return $this;
    }
    public function validation($value)
    {
        $hosts = strtolower(implode("|", $this->getHosts()));
        $value = strtolower($value);
        return ! (bool) preg_match("/\@(" . $hosts . ")\$/", $value);
    }
}