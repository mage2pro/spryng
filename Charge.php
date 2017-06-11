<?php
namespace Dfe\Spryng;
use Magento\Sales\Model\Order\Address;
// 2017-02-18
// https://api.spryngpayments.com/v1/#operation/createTransaction
/** @method Settings s() */
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
	 * @see \Df\StripeClone\Charge::pCustomer()
	 * @used-by \Df\StripeClone\Charge::newCard()
	 * @return array(string => mixed)
	 */
	protected function pCustomer() {/** @var Address|null $sa */ $sa = $this->addressSB(); return [
		'city' => $sa->getCity()
		,'country_code' => $sa->getCountryId()
		,'date_of_birth' => $this->customerDobS()
		,'email_address' => $this->customerEmail()
		,'first_name' => $this->customerNameF()
		,'gender' => $this->customerGender('male', 'female')
		,'last_name' => $this->customerNameL()
		// 2017-02-18
		// [Spryng] The documentation says that the «organisation» is a required parameter
		// of a «createCustomer» API request, but really the request works without it:
		// https://mage2.pro/t/2844
		//,'organisation' => 'Mage2.PRO'
		// 2017-02-18
		// Нельзя передавать одновременно и имя, и название организации.
		//,'organisation_name' => 'Mage2.PRO'
		,'phone_number' => $sa->getTelephone()
		,'postal_code' => $sa->getPostcode()
		// 2017-02-18
		// Передача null в качестве региона приводит к сбою.
		,'region' => $sa->getRegion() ?: $sa->getCity()
		// 2017-02-18
		// https://mage2.pro/t/2566
		// Этот параметр необязателен.
		//,'social_security_number' => $sa->getVatId()
		,'street_address' => df_cc_s($sa->getStreetLine(1), $sa->getStreetLine(2))
		,'title' => $this->customerGender('mr', 'ms')
	];}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::k_Capture()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string
	 */
	protected function k_Capture() {return 'capture_now';}

	/**
	 * 2017-02-18
	 * Ключ, значением которого является токен банковской карты.
	 * Этот ключ передаётся как параметр ДВУХ РАЗНЫХ запросов к API ПС:
	 * 1) в запросе на проведение транзакции (charge)
	 * 2) в запросе на сохранение банковской карты для будущего повторного использования
	 * Spryng пока не поддерживает (или не документировал) сохранение банковской карты
	 * для будущего повторного использования.
	 * @override
	 * @see \Df\StripeClone\Charge::k_CardId()
	 * @used-by kc_Excluded()
	 * @used-by \Df\StripeClone\Charge::newCard()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string
	 */
	protected function k_CardId() {return 'card';}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::k_CardId()
	 * @used-by \Df\StripeClone\Charge::newCard()
	 * @return string
	 */
	protected function kc_Email() {return 'email_address';}

	/**
	 * 2017-02-18
	 * https://api.spryngpayments.com/v1/#operation/createTransaction
	 * @override
	 * @see \Df\StripeClone\Charge::k_DSD()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string
	 */
	protected function k_DSD() {return 'dynamic_descriptor';}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::k_Excluded()
	 * @used-by \Df\StripeClone\Charge::request()
	 * @return string[]
	 */
	protected function k_Excluded() {return [parent::K_CURRENCY, parent::K_DESCRIPTION];}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\Charge::kc_Excluded()
	 * @used-by \Df\StripeClone\Charge::newCard()
	 * @return string[]
	 */
	protected function kc_Excluded() {return [parent::KC_DESCRIPTION, $this->k_CardId()];}
}