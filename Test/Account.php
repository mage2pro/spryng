<?php
# 2017-02-18
namespace Dfe\Spryng\Test;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
final class Account extends CaseT {
	/** 2017-02-15 @test */
	function t00():void {}

	/** 2017-02-15 */
	function t01():void {
		/** @var lAccount $accounts */
		$account = df_first($this->api()->account->getAll());
		print_r(df_json_encode($account));
	}

	/** 2017-02-15 */
	function t02():void {print_r(df_json_encode($this->s()->account()));}
}