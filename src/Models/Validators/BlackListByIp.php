<?php
namespace Armor\Trial\Models\Validators;

class BlackListByIp
{
    private $ips = [];
    protected function getIps () {
        return $this->ips;
    }
    public function __construct() {
        $emailsFileContent = file_get_contents(__DIR__ . "/ip.txt");
        $ip = explode(PHP_EOL, $emailsFileContent);
        $this->ips = $ip;
    }
    public function verify($ip) {
        $ips = implode("|", $this->getIps());
        return ! (bool) preg_match("/{$ips}/", $ip);
    }
}
