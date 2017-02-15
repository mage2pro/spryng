<?php
// 2017-02-15
namespace Dfe\Spryng\T;
use Dfe\Spryng\Settings as S;
final class Common extends TestCase {
	/** 2017-02-15 */
	function t00() {}

	/** @test 2017-02-15 */
	function t01() {
		echo S::s()->publicKey() . "\n";
		echo S::s()->privateKey() . "\n";
	}
}