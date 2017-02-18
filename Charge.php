<?php
namespace Dfe\Spryng;
// 2017-02-18
/** @method Settings ss() */
final class Charge extends \Df\StripeClone\Charge {
	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::cardIdPrefix()
	 * @used-by \Df\StripeClone\Charge::usePreviousCard()
	 * @return string
	 */
	protected function cardIdPrefix() {return null;}
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
	 * https://api.spryngpayments.com/v1/#operation/createTransaction
	 * @override
	 * @see \Df\StripeClone\Charge::keyDSD()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string
	 */
	protected function keyDSD() {return 'dynamic_descriptor';}
}