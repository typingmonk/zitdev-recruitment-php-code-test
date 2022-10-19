<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\App\Demo;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase {

    public function test_foo() {
		$demo = new Demo("", new HttpRequest());
		$value = $demo->foo();
		$this->assertEquals("bar", $value);	
    }

    public function test_get_user_info() {
		$demo = new Demo("", new HttpRequest());
		$value = $demo->get_user_info();
		$this->assertEquals(null, $value);
    }
}
