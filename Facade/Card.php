<?php
namespace Dfe\Spryng\Facade;
use SpryngPaymentsApiPhp\Object\Card as C;
// 2017-02-17
final class Card implements \Df\StripeClone\Facade\ICard {
	/**
	 * 2017-02-17
	 * @used-by \Df\StripeClone\Facade\Card::create()
	 * @param C|array(string => string) $p
	 */
	function __construct($p) {}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::brand()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @used-by \Df\StripeClone\CardFormatter::label()
	 * @return string
	 */
	function brand() {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::country()
	 * @used-by \Df\StripeClone\CardFormatter::country()
	 * @return string
	 */
	function country() {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::expMonth()
	 * @used-by \Df\StripeClone\CardFormatter::exp()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @return string
	 */
	function expMonth() {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::expYear()
	 * @used-by \Df\StripeClone\CardFormatter::exp()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @return string
	 */
	function expYear() {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::id()
	 * @used-by \Df\StripeClone\ConfigProvider::cards()
	 * @used-by \Df\StripeClone\Facade\Customer::cardIdForJustCreated()
	 * @return string
	 */
	function id() {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::last4()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @used-by \Df\StripeClone\CardFormatter::label()
	 * @return string
	 */
	function last4() {return null;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\ICard::owner()
	 * @used-by \Df\StripeClone\CardFormatter::ii()
	 * @return string
	 */
	function owner() {return null;}

	/**
	 * 2017-02-17
	 * @var array(string => string)
	 */
	private $_p;
}