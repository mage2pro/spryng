<?php
# 2017-02-15
namespace Dfe\Spryng;
use Magento\Framework\App\ScopeInterface as S;
use Magento\Store\Model\Store;
use SpryngPaymentsApiPhp\Client as API;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
/** @method static Settings s() */
final class Settings extends \Df\StripeClone\Settings {
	/**
	 * 2017-02-15
	 * @used-by \Dfe\Spryng\Currency::_iso3()
	 * @used-by \Dfe\Spryng\P\Charge::p()
	 * @param null|string|int|S|Store $s [optional]
	 */
	function account($s = null):lAccount {return dfc($this, function($s):lAccount {return
		$this->api($s)->account->getById($this->testable('account', $s))
	;}, [$s]);}

	/**
	 * 2017-02-15
	 * @used-by self::account()
	 * @used-by \Dfe\Spryng\Method::api()
	 * @param null|string|int|S|Store $s [optional]
	 */
	function api($s = null):API {return dfc($this, function($s):API {return new API(
		$this->privateKey($s), $this->test($s)
	);}, [$s]);}
}