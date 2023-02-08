<?php
# 2017-02-15
namespace Dfe\Spryng\Test;
final class Common extends CaseT {
	/** 2017-02-15 @test */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		print_r($this->s()->publicKey() . "\n");
		print_r($this->s()->privateKey() . "\n");
	}
}