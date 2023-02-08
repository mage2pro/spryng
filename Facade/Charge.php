<?php
namespace Dfe\Spryng\Facade;
use SpryngPaymentsApiPhp\Client as API;
use SpryngPaymentsApiPhp\Controller\TransactionController as API_Transaction;
use SpryngPaymentsApiPhp\Object\Transaction as C;
# 2017-02-17
/** @method \Dfe\Spryng\Method m() */
final class Charge extends \Df\StripeClone\Facade\Charge {
	/**
	 * 2017-02-19
	 * https://api.spryngpayments.com/v1/#operation/captureTransaction
	 * https://mage2.pro/t/2850
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::capturePreauthorized()
	 * @used-by \Df\StripeClone\Method::charge()
	 * @param int|float $a
	 * The $a value is already converted to the PSP currency and formatted according to the PSP requirements.
	 */
	function capturePreauthorized(string $id, $a):C {return $this->apiT()->capture($id, $a);}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::create()
	 * @used-by \Df\StripeClone\Method::chargeNew()
	 * @param array(string => mixed) $p
	 */
	function create(array $p):C {
		$r = $this->apiT()->create($p); /** @var C $r */
		# 2017-02-19
		# Why does a «createTransaction» API method response not contain the bank card information? https://mage2.pro/t/2812
		$r->card = $this->api()->card->getById($r->card->_id);
		return $r;
	}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::id()
	 * @used-by \Df\StripeClone\Method::chargeNew()
	 * @param C $c
	 */
	function id($c):string {return $c->_id;}

	/**
	 * 2017-02-17
	 * Returns the path to the bank card information
	 * in a charge converted to an array by @see \Dfe\Stripe\Facade\O::toArray()
	 * [Spryng] An example of the «createTransaction» API method response
	 * (while using the Spryng PHP SDK): https://mage2.pro/t/2800
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::pathToCard()
	 * @used-by \Df\StripeClone\Block\Info::cardDataFromChargeResponse()
	 * @used-by \Df\StripeClone\Facade\Charge::cardData()
	 */
	function pathToCard():string {return 'card';}

	/**
	 * 2017-02-17
	 * 2022-12-19 The $a value is already converted to the PSP currency and formatted according to the PSP requirements.
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::refund()
	 * @used-by self::void()
	 * @used-by \Df\StripeClone\Method::_refund()
	 * @return null
	 */
	function refund(string $id, int $a) {return null;}

	/**
	 * 2017-02-19
	 * https://api.spryngpayments.com/v1/#operation/voidAuthTransaction
	 * https://mage2.pro/t/2851
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::void()
	 * @used-by \Df\StripeClone\Method::_refund()
	 */
	function void(string $id):C {return $this->apiT()->void($id);}

	/**
	 * 2017-02-18
	 * Spryng пока не поддерживает (или не документировал) сохранение банковской карты
	 * для будущего повторного использования, поэтому мы просто возвращаем `null`.
	 * Этого достаточно, чтобы @used-by \Df\StripeClone\P\Charge::tokenIsNew() всегда возвращала `false`.
	 * @override
	 * @see \Df\StripeClone\Facade\Charge::cardIdPrefix()
	 * @used-by \Df\StripeClone\Payer::tokenIsNew()
	 */
	protected function cardIdPrefix():string {return '';}

	/**
	 * 2017-02-17
	 * @used-by self::apiT()
	 * @used-by self::create()
	 */
	private function api():API {return $this->m()->api();}

	/**
	 * 2017-02-17
	 * @used-by self::capturePreauthorized()
	 * @used-by self::create()
	 */
	private function apiT():API_Transaction {return $this->api()->transaction;}
}