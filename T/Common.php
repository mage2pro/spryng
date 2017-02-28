<?php
// 2017-02-15
namespace Dfe\Spryng\T;
final class Common extends TestCase {
	/** @test 2017-02-15 */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		echo $this->s()->publicKey() . "\n";
		echo $this->s()->privateKey() . "\n";
	}
}