<?php
// 2017-02-15
namespace Dfe\Spryng\Test;
final class Common extends CaseT {
	/** @test 2017-02-15 */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		print_r($this->s()->publicKey() . "\n");
		print_r($this->s()->privateKey() . "\n");
	}
}