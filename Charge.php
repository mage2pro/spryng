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
	 * Этот ключ передаётся как параметр при создании 2 разных объектов:
	 * 1) как источник средств для charge
	 * 2) как token для customer.
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