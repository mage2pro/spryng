<?php
namespace Dfe\Spryng\T;
use SpryngPaymentsApiPhp\Client as API;
/**
 * 2017-02-15
 * @see \Dfe\Spryng\T\Account
 * @see \Dfe\Spryng\T\Card
 * @see \Dfe\Spryng\T\Charge
 * @see \Dfe\Spryng\T\Common
 * @see \Dfe\Spryng\T\Customer
 * @method \Dfe\Spryng\Settings s()
 */
abstract class CaseT extends \Df\Core\TestCase {
	/**
	 * 2017-02-15
	 * @return string
	 */
	final protected function acccountId() {return $this->s()->account()->_id;}

	/**
	 * 2017-02-15
	 * @return API
	 */
	final protected function api() {return $this->s()->api();}
}