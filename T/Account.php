<?php
// 2017-02-18
namespace Dfe\Spryng\T;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
final class Account extends CaseT {
	/** @test 2017-02-15 */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		/** @var lAccount $accounts */
		$account = df_first($this->api()->account->getAll());
		print_r(df_json_encode($account));
	}

	/** 2017-02-15 */
	function t02() {print_r(df_json_encode($this->s()->account()));}
}