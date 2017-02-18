<?php
// 2017-02-18
namespace Dfe\Spryng\T;
use Dfe\Spryng\Settings as S;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
final class Account extends TestCase {
	/** @test 2017-02-15 */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		/** @var lAccount $accounts */
		$account = df_first($this->api()->account->getAll());
		echo df_json_encode_pretty($account);
	}

	/** 2017-02-15 */
	function t02() {echo df_json_encode_pretty(S::s()->account());}
}