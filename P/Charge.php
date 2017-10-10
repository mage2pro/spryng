<?php
namespace Dfe\Spryng\P;
// 2017-02-18
// https://api.spryngpayments.com/v1/#operation/createTransaction
/** @method \Dfe\Spryng\Settings s() */
final class Charge extends \Df\StripeClone\P\Charge {
	/**
	 * 2017-02-18
	 * 2017-10-09 The key name of a bank card token or of a saved bank card ID.
	 * @override
	 * @see \Df\StripeClone\P\Charge::k_CardId()
	 * @used-by kc_Excluded()
	 * @used-by \Df\StripeClone\P\Charge::request()
	 * @return string
	 */
	function k_CardId() {return 'card';}

	/**
	 * 2017-02-18
	 * Здесь у order ещё нет id, но уже есть incrementId (потому что зарезервирован).
	 * @override
	 * @see \Df\StripeClone\P\Charge::p()
	 * @used-by \Df\StripeClone\P\Charge::request()
	 * @return array(string => mixed)
	 */
	protected function p() {return [
		'account' => $this->s()->account()->_id
		,'customer_ip' => $this->customerIp()
		// 2017-02-18
		// [Spryng][API] It looks like the description of the «merchant_reference»
		// transaction's parameter is incorrect: https://mage2.pro/t/2842
		,'merchant_reference' => $this->id()
		// 2017-02-15
		// «The payment product being used»
		// https://www.spryngpayments.com/documentation/credit-cards/
		,'payment_product' => 'card'
		,'user_agent' => df_request_ua()
	];}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\P\Charge::k_Capture()
	 * @used-by \Df\StripeClone\P\Charge::request()
	 * @return string
	 */
	protected function k_Capture() {return 'capture_now';}

	/**
	 * 2017-02-18
	 * https://api.spryngpayments.com/v1/#operation/createTransaction
	 * @override
	 * @see \Df\StripeClone\P\Charge::k_DSD()
	 * @used-by \Df\StripeClone\P\Charge::request()
	 * @return string
	 */
	protected function k_DSD() {return 'dynamic_descriptor';}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\P\Charge::k_Excluded()
	 * @used-by \Df\StripeClone\P\Charge::request()
	 * @return string[]
	 */
	protected function k_Excluded() {return [parent::K_CURRENCY, parent::K_DESCRIPTION];}
}