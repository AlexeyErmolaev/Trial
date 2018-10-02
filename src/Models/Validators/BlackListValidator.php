<?php
namespace Armor\Trial\Models\Validators;

class BlackListValidator extends BlackList
{
    public function __construct()
    {
        $emailsFileContent = file_get_contents(__DIR__ . "/emails.txt");
        $hosts = explode(PHP_EOL, $emailsFileContent);
        $this->hosts = $hosts;
    }

}