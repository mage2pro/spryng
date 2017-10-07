<?php
namespace Dfe\Spryng\Facade;
use SpryngPaymentsApiPhp\Object\Card as C;
// 2017-02-17
// https://api.spryngpayments.com/v1/#operation/getCard
// A real API response does not contain all the documented fields: https://mage2.pro/t/2819
final class Card implements \Df\StripeClone\Facade\ICard {
	/**
	 * 2017-02-17
	 * @used-by \Df\StripeClone\Facade\Card::create()
	 * @param C|array(string => string) $p
	 */
	function __construct($p) {$this->_p = is_array($p) ? $p : get_object_vars($p);}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::brand()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @used-by \Df\StripeClone\CardFormatter::label()
	 * @return string
	 */
	function brand() {return $this->_p['brand'];}

	/**
	 * 2017-02-17
	 * [Spryng] Why does a «getCard» API method response not contain the «issuer_country» property?
	 * https://mage2.pro/t/2819
	 * 2017-10-07 It should be an ISO-2 code or `null`.
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::country()
	 * @used-by \Df\StripeClone\CardFormatter::country()
	 * @return null
	 */
	function country() {return $this->_p['issuer_country'];}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::expMonth()
	 * @used-by \Df\StripeClone\CardFormatter::exp()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @return int
	 */
	function expMonth() {return $this->_p['expiry_month'];}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::expYear()
	 * @used-by \Df\StripeClone\CardFormatter::exp()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @return string
	 */
	function expYear() {return "20{$this->_p['expiry_year']}";}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::id()
	 * @used-by \Df\StripeClone\ConfigProvider::cards()
	 * @used-by \Df\StripeClone\Facade\Customer::cardIdForJustCreated()
	 * @return string
	 */
	function id() {return $this->_p['_id'];}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::last4()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @used-by \Df\StripeClone\CardFormatter::label()
	 * @return string
	 */
	function last4() {return $this->_p['last_four'];}

	/**
	 * 2017-02-17
	 * [Spryng] Is any possibility to collect the cardholder's name? https://mage2.pro/t/2802
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::owner()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @return string
	 */
	function owner() {return $this->_p['cardholder_name'];}

	/**
	 * 2017-02-17
	 * @var array(string => string)
	 */
	private $_p;
}