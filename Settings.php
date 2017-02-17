<?php
// 2017-02-15
namespace Dfe\Spryng;
use SpryngPaymentsApiPhp\Client as API;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
/** @method static Settings s() */
final class Settings extends \Df\StripeClone\Settings {
	/**
	 * 2017-02-15
	 * @return lAccount
	 */
	public function account() {return dfc($this, function() {return
		$this->api()->account->getById($this->testable('account'))
	;});}

	/**
	 * 2017-02-15
	 * @used-by account()
	 * @used-by \Dfe\Spryng\Method::api()
	 * @param bool|null $test [optional]
	 * @return API
	 */
	public function api($test = null) {return dfc($this, function($test) {return new API(
		$this->p(($test ? 'test' : 'live') . 'PrivateKey'), $test
	);}, [!is_null($test) ? $test : $this->test()]);}
}