<?php
namespace Dfe\Spryng\Test;
use SpryngPaymentsApiPhp\Client as API;
/**
 * 2017-02-15
 * @see \Dfe\Spryng\Test\Account
 * @see \Dfe\Spryng\Test\Card
 * @see \Dfe\Spryng\Test\Charge
 * @see \Dfe\Spryng\Test\Common
 * @see \Dfe\Spryng\Test\Customer
 * @method \Dfe\Spryng\Settings s()
 */
abstract class CaseT extends \Df\Core\TestCase {
	/**
	 * 2017-02-15
	 * @used-by \Dfe\Spryng\Test\Charge::t01_refund()
	 * @used-by \Dfe\Spryng\Test\Charge::t02_auth_and_capture()
	 * @used-by \Dfe\Spryng\Test\Charge::t03_auth_and_capture_partial()
	 * @used-by \Dfe\Spryng\Test\Charge::t04_auth_and_void()
	 */
	final protected function acccountId():string {return $this->s()->account()->_id;}

	/**
	 * 2017-02-15
	 * @used-by \Dfe\Spryng\Test\Account::t01()
	 * @used-by \Dfe\Spryng\Test\Card::t01()
	 * @used-by \Dfe\Spryng\Test\Charge::t01_refund()
	 * @used-by \Dfe\Spryng\Test\Charge::t02_auth_and_capture()
	 * @used-by \Dfe\Spryng\Test\Charge::t03_auth_and_capture_partial()
	 * @used-by \Dfe\Spryng\Test\Charge::t04_auth_and_void()
	 * @used-by \Dfe\Spryng\Test\Customer::t01()
	 */
	final protected function api():API {return $this->s()->api();}
}