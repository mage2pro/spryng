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
	 */
	public function account($s = null) {return dfc($this, function($s) {return
		$this->api(null, $s)->account->getById($this->testable('account', $s))
	;}, [$s]);}

	/**
	 * 2017-02-15
	 * @used-by account()
	 * @used-by \Dfe\Spryng\Method::api()
	 * @param bool|null $test [optional]
	 * @param null|string|int|S|Store $s [optional]
	 * @return API
	 */
	public function api($test = null, $s = null) {return dfc($this, function($test, $s) {return new API(
		$this->p(($test ? 'test' : 'live') . 'PrivateKey', $s), $test
	);}, [!is_null($test) ? $test : $this->test(), $s]);}

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