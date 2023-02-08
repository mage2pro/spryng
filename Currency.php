<?php
namespace Dfe\Spryng;
use Magento\Framework\App\ScopeInterface as IScope;
use Magento\Store\Model\Store;
# 2017-10-12
/** @method Settings s() */
final class Currency extends \Df\Payment\Currency {
	/**
	 * 2017-10-12
	 * @override
	 * @see \Df\Payment\Currency::_iso3()
	 * @used-by \Df\Payment\Currency::iso3()
	 * @param null|string|int|IScope|Store $s [optional]
	 */
	protected function _iso3($s = null):string {return $this->s()->account($s)->currency_code;}
}