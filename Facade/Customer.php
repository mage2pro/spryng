<?php
namespace Dfe\Spryng\Facade;
use SpryngPaymentsApiPhp\Client as API;
use SpryngPaymentsApiPhp\Object\Customer as C;
# 2017-02-17
/** @method \Dfe\Spryng\Method m() */
final class Customer extends \Df\StripeClone\Facade\Customer {

	/**
	 * 2017-02-17
	 * 2022-12-19 We can not declare the $c argument type because it is undeclared in the overriden method.
	 * @override
	 * @see \Df\StripeClone\Facade\Customer::cardAdd()
	 * @used-by \Df\StripeClone\Payer::newCard()
	 * @param C $c
	 */
	function cardAdd($c, string $token):string {return $token;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Customer::create()
	 * @used-by \Df\StripeClone\Payer::newCard()
	 * @param array(string => mixed) $p
	 */
	function create(array $p):C {return $this->api()->customer->create($p);}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Customer::id()
	 * @used-by \Df\StripeClone\Payer::newCard()
	 * @param C $c
	 */
	function id($c):string {return $c->_id;}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Customer::_get()
	 * @used-by \Df\StripeClone\Facade\Customer::get()
	 * @param string $id
	 * @return C|null
	 */
	protected function _get($id) {return $this->api()->customer->getById($id);}

	/**
	 * 2017-02-17
	 * @override
	 * @see \Df\StripeClone\Facade\Customer::cardsData()
	 * @used-by \Df\StripeClone\Facade\Customer::cards()
	 * @param C $c
	 * @return \SpryngPaymentsApiPhp\Object\Card[]
	 * @see \Dfe\Stripe\Facade\Charge::cardData()
	 */
	protected function cardsData($c) {return [];}

	/**
	 * 2017-02-17
	 * @return API
	 */
	private function api() {return $this->m()->api();}
}