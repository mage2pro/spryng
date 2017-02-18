<?php
namespace Dfe\Spryng;
// 2017-02-18
// https://api.spryngpayments.com/v1/#operation/createTransaction
/** @method Settings ss() */
final class Charge extends \Df\StripeClone\Charge {
	/**
	 * 2017-02-18
	 * Spryng пока не поддерживает (или не документировал) сохранение банковской карты
	 * для будущего повторного использования, поэтому мы просто возвращаем null.
	 * Этого достаточно, чтобы @used-by \Df\StripeClone\Charge::usePreviousCard()
	 * всегда возвращала false.
	 * @override
	 * @see \Df\StripeClone\Charge::cardIdPrefix()
	 * @used-by \Df\StripeClone\Charge::usePreviousCard()
	 * @return string
	 */
	protected function cardIdPrefix() {return null;}

	/**
	 * 2017-02-18
	 * Здесь у order ещё нет id, но уже есть incrementId (потому что зарезервирован).
	 * @override
	 * @see \Df\StripeClone\Charge::pCharge()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return array(string => mixed)
	 */
	protected function pCharge() {return [
		'customer_ip' => $this->customerIp()
		// 2017-02-18
		// [Spryng][API] It looks like the description of the «merchant_reference»
		// transaction's parameter is incorrect: https://mage2.pro/t/2842
		,'merchant_reference' => $this->oii()
		,'user_agent' => df_request_ua()
	];}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::keyCapture()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string
	 */
	protected function keyCapture() {return 'capture_now';}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::keyCurrency()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string|null
	 */
	protected function keyCurrency() {return null;}

	/**
	 * 2017-02-18
	 * Ключ, значением которого является токен банковской карты.
	 * Этот ключ передаётся как параметр ДВУХ РАЗНЫХ запросов к API ПС:
	 * 1) в запросе на проведение транзакции (charge)
	 * 2) в запросе на сохранение банковской карты для будущего повторного использования
	 * Spryng пока не поддерживает (или не документировал) сохранение банковской карты
	 * для будущего повторного использования.
	 * @override
	 * @see \Df\StripeClone\Charge::keyCardId()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @used-by \Df\StripeClone\Charge::newCard()
	 * @return string
	 */
	protected function keyCardId() {return 'card';}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::keyDescription()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string
	 */
	protected function keyDescription() {return null;}

	/**
	 * 2017-02-18
	 * https://api.spryngpayments.com/v1/#operation/createTransaction
	 * @override
	 * @see \Df\StripeClone\Charge::keyDSD()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string
	 */
	protected function keyDSD() {return 'dynamic_descriptor';}
}