<?php
// 2017-02-15
namespace Dfe\Spryng\T;
use Dfe\Spryng\Settings as S;
use SpryngPaymentsApiPhp\Client as API;
abstract class TestCase extends \Df\Core\TestCase {
	/**
	 * 2017-02-15
	 * @return string
	 */
	final protected function acccountId() {return S::s()->account()->_id;}

	/**
	 * 2017-02-15
	 * @return API
	 */
	final protected function api() {return S::s()->api();}
}