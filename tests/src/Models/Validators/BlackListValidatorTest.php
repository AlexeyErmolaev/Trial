<?php
namespace Armor\Trial\Models\Validators;
use PHPUnit_Framework_TestCase;

class BlackListValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var BlackListValidator
     */
    protected $validator;
    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data = [], $dataName);
        $this->validator = new BlackListValidator();
    }
    public function testMailinatorCom () {
        $this->assertFalse($this->validator->validation("test@mailinator.com"));
        $this->assertTrue($this->validator->validation("test@mailinator.ru"));
    }
    public function testBinkmailCom () {
        $this->assertFalse($this->validator->validation("name@binkmail.com"));
        $this->assertTrue($this->validator->validation("name@bisnkmail.com"));
    }
    public function testBobmailInfo () {
        $this->assertFalse($this->validator->validation("admin@bobmail.info"));
        $this->assertTrue($this->validator->validation("admin@bobmail.infod"));
    }
    public function testChammyInfo () {
        $this->assertFalse($this->validator->validation("test@chammy.info"));
        $this->assertTrue($this->validator->validation("test@dchammy.info"));
    }
    public function test163Com () {
        $this->assertFalse($this->validator->validation("723654289@163.com"));
        $this->assertFalse($this->validator->validation("simod@163.com"));
        $this->assertTrue($this->validator->validation("163@spb.com"));
    }
    public function testSohuCom () {
        $this->assertFalse($this->validator->validation("admin@sohu.com"));
        $this->assertTrue($this->validator->validation("support@sochi.com"));
    }
    public function testСoncreditoСom () {
        $this->assertFalse($this->validator->validation("admin@concredito.com"));
        $this->assertTrue($this->validator->validation("admin@concredito.uk"));
    }
    public function testWhiteList() {
        $this->assertTrue($this->validator->validation("test@gmail.com"));
        $this->assertTrue($this->validator->validation("test2@yandex.ru"));
        $this->assertTrue($this->validator->validation("test3@rambler.com"));
    }
}