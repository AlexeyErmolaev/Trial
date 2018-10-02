<?php
namespace Armor\Trial\Models\Validators;
use PHPUnit_Framework_TestCase;

class BlackListValidatorIpTest extends PHPUnit_Framework_TestCase {
  /**
   * @var BlackListByIp
   */
  protected $blakcList;
  public function __construct($name = null, array $data = [], $dataName = '') {
    parent::__construct($name, $data = [], $dataName);
    $this->blakcList = new BlackListByIp();
  }
  public function testReturnedTrue__168_192_1_1() {
    $this->assertTrue($this->blakcList->verify('168.192.1.1'));
  }
  public function testReturnedTrue__77_75_120_8() {
    $this->assertTrue($this->blakcList->verify('77.75.120.8'));
  }
  public function testReturnedTrue__8_8_8_8() {
    $this->assertTrue($this->blakcList->verify('8.8.8.8'));
  }
  public function testReturnedFalse__221_226_65_2 () {
    $this->assertFalse($this->blakcList->verify('221.226.65.2'));
  }
  public function testReturnedFalse__23_83_248_102 () {
    $this->assertFalse($this->blakcList->verify('23.83.248.102'));
  }
  public function testReturnedFalse__115_236_70_20 () {
    $this->assertFalse($this->blakcList->verify('115.236.70.20'));
  }
  public function testReturnedFalse__115_236_70_1 () {
    $this->assertFalse($this->blakcList->verify('115.236.70.1'));
  }
  public function testReturnedFalse__115_236_70_99 () {
    $this->assertFalse($this->blakcList->verify('115.236.70.99'));
  }
  public function testReturnedFalse__219_237_16_21 () {
    $this->assertFalse($this->blakcList->verify('219.237.16.21'));
  }
  public function testReturnedFalse__60_248_167_190 () {
    $this->assertFalse($this->blakcList->verify('60.248.167.190'));
  }
  public function testReturnedFalse__90_191_218_222 () {
    $this->assertFalse($this->blakcList->verify('90.191.218.222'));
  }
  public function testReturnedFalse__165_225_76_135 () {
    $this->assertFalse($this->blakcList->verify('165.225.76.135'));
  }
  public function testReturnedFalse__187_141_142_199 () {
    $this->assertFalse($this->blakcList->verify('187.141.142.199'));
  }
  public function testReturnedFalse__1_180_235_38 () {
    $this->assertFalse($this->blakcList->verify('1.180.235.38'));
  }
  public function testReturnedFalse__200_52_73_203 () {
    $this->assertFalse($this->blakcList->verify('200.52.73.203'));
  }
}
