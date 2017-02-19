<?php
namespace Dfe\Spryng\Facade;
use Magento\Sales\Model\Order\Creditmemo as CM;
use Magento\Sales\Model\Order\Payment as OP;
use SpryngPaymentsApiPhp\Client as API;
use SpryngPaymentsApiPhp\Object\Transaction as C;
// 2017-02-17
/** @method \Dfe\Spryng\Method m() */
final class Charge extends \Df\StripeClone\Facade\Charge {
	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::capturePreauthorized()
	 * @used-by \Df\StripeClone\Method::charge()
	 * @param string $id
	 * @return C
	 */
	function capturePreauthorized($id) {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::create()
	 * @used-by \Df\StripeClone\Method::chargeNew()
	 * @param array(string => mixed) $p
	 * @return C
	 */
	function create(array $p) {
		/** @var C $result */
		$result = $this->api()->transaction->create($p);
		// 2017-02-19
		// Why does a «createTransaction» API method response
		// not contain the bank card information? https://mage2.pro/t/2812
		$result->card = $this->api()->card->getById($result->card->_id);
		return $result;
	}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::id()
	 * @used-by \Df\StripeClone\Method::chargeNew()
	 * @param C $c
	 * @return string
	 */
	function id($c) {return $c->_id;}

	/**
	 * 2017-02-17
	 * Returns the path to the bank card information
	 * in a charge converted to an array by @see \Dfe\Stripe\Facade\O::toArray()
	 * [Spryng] An example of the «createTransaction» API method response
	 * (while using the Spryng PHP SDK): https://mage2.pro/t/2800
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::pathToCard()
	 * @used-by \Df\StripeClone\Block\Info::prepare()
	 * @return string
	 */
	function pathToCard() {return 'card';}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::refund()
	 * @used-by void
	 * @used-by \Df\StripeClone\Method::_refund()
	 * @param string $id
	 * @param float $amount
	 * В формате и валюте платёжной системы.
	 * Значение готово для применения в запросе API.
	 * @return object
	 */
	function refund($id, $amount) {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::void()
	 * @used-by \Df\StripeClone\Method::_refund()
	 * @param string $id
	 * @return object
	 */
	function void($id) {return null;}

	/**
	 * 2017-02-17
	 * Информация о банковской карте.
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::cardData()
	 * @used-by \Df\StripeClone\Facade\Charge::card()
	 * @param C $c
	 * @return \SpryngPaymentsApiPhp\Object\Card
	 * @see \Dfe\Stripe\Facade\Customer::cardsData()
	 */
	protected function cardData($c) {return $c->card;}

	/**
	 * 2017-02-17
	 * @return API
	 */
	private function api() {return $this->m()->api();}
}