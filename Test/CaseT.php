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
	 */
	final protected function acccountId():string {return $this->s()->account()->_id;}

	/**
	 * 2017-02-15
	 * @return API
	 */
	final protected function api() {return $this->s()->api();}
}