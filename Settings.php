<?php
// 2017-02-15
namespace Dfe\Spryng;
use Magento\Framework\App\ScopeInterface as S;
use Magento\Store\Model\Store;
use SpryngPaymentsApiPhp\Client as API;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
/** @method static Settings s() */
final class Settings extends \Df\StripeClone\Settings {
	/**
	 * 2017-02-15
	 * @param null|string|int|S|Store $s [optional]
	 * @return lAccount
	 * @used-by currency()
	 * @used-by \Dfe\Spryng\P\Charge::p()
	 */
	function account($s = null) {return dfc($this, function($s) {return
		$this->api($s)->account->getById($this->testable('account', $s))
	;}, [$s]);}

	/**
	 * 2017-02-15
	 * @used-by account()
	 * @used-by \Dfe\Spryng\Method::api()
	 * @param null|string|int|S|Store $s [optional]
	 * @return API
	 */
	function api($s = null) {return dfc($this, function($s) {return new API(
		$this->privateKey($s), $this->test($s)
	);}, [$s]);}

	/**
	 * 2017-02-18   
	 * @override
	 * @see \Df\Payment\Settings::currency()
	 * @used-by \Df\Payment\Settings::_cur()
	 * @param null|string|int|S|Store $s [optional]
	 * @return string
	 */
	protected function currency($s = null) {return $this->account($s)->currency_code;}
}