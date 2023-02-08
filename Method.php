<?php
# 2017-02-15
namespace Dfe\Spryng;
use Magento\Sales\Model\Order\Payment\Transaction as T;
use SpryngPaymentsApiPhp\Client as API;
/** @method Settings s() */
final class Method extends \Df\StripeClone\Method {
	/**
	 * 2017-02-17
	 * @used-by \Dfe\Spryng\Facade\Charge::api()
	 * @used-by \Dfe\Spryng\Facade\Customer::api()
	 */
	function api():API {return $this->s()->api();}

	/**
	 * 2017-02-19
	 * @override
	 * @see \Df\Payment\Method::canCapturePartial()
	 */
	function canCapturePartial():bool {return true;}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Payment\Method::amountLimits()
	 * @used-by \Df\Payment\Method::isAvailable()
	 * @return null
	 */
	protected function amountLimits() {return null;}

	/**
	 * 2017-02-15
	 * 2017-02-19
	 * "[Spryng] It would be nice to have an unique URL for each transaction inside the merchant interface":
	 * https://mage2.pro/t/2847
	 * @override
	 * @see \Df\StripeClone\Method::transUrlBase()
	 * @used-by \Df\StripeClone\Method::transUrl()
	 */
	protected function transUrlBase(T $t):string {return '';}
}