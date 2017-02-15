<?php
// 2017-02-15
namespace Dfe\Spryng\T;
use Dfe\Spryng\Settings as S;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
final class Common extends TestCase {
	/** 2017-02-15 */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		echo S::s()->publicKey() . "\n";
		echo S::s()->privateKey() . "\n";
	}

	/** @test */
	function t02() {
		/** @var lAccount[] $accounts */
        $accounts = $this->api()->account->getAll();
		xdebug_break();
	}
}