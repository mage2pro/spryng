<?php
namespace Dfe\Spryng\P;
use Magento\Sales\Model\Order\Address as A;
# 2017-06-11
final class Reg extends \Df\StripeClone\P\Reg {
	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\P\Reg::p()
	 * @used-by \Df\StripeClone\P\Reg::request()
	 * @return array(string => mixed)
	 */
	protected function p():array {/** @var A|null $sa */ $sa = $this->addressB(); return [
		'city' => $sa->getCity()
		,'country_code' => $sa->getCountryId()
		,'date_of_birth' => $this->customerDobS()
		,'email_address' => $this->customerEmail()
		,'first_name' => $this->customerNameF()
		,'gender' => $this->customerGender('male', 'female')
		,'last_name' => $this->customerNameL()
		# 2017-02-18
		# [Spryng] The documentation says that the «organisation» is a required parameter
		# of a «createCustomer» API request, but really the request works without it:
		# https://mage2.pro/t/2844
		//,'organisation' => 'Mage2.PRO'
		# 2017-02-18
		# Нельзя передавать одновременно и имя, и название организации.
		//,'organisation_name' => 'Mage2.PRO'
		,'phone_number' => $sa->getTelephone()
		,'postal_code' => $sa->getPostcode()
		# 2017-02-18
		# Передача null в качестве региона приводит к сбою.
		,'region' => $sa->getRegion() ?: $sa->getCity()
		# 2017-02-18
		# https://mage2.pro/t/2566
		# Этот параметр необязателен.
		//,'social_security_number' => $sa->getVatId()
		,'street_address' => df_cc_s($sa->getStreet())
		,'title' => $this->customerGender('mr', 'ms')
	];}

	/**
	 * 2017-10-10 The key name of a bank card token.
	 * @override
	 * @see \Df\StripeClone\P\Reg::k_CardId()
	 * @used-by \Df\StripeClone\P\Reg::request()
	 */
	protected function k_CardId():string {return '';}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\P\Reg::k_Email()
	 * @used-by \Df\StripeClone\P\Reg::request()
	 */
	protected function k_Email():string {return 'email_address';}

	/**
	 * 2017-02-18
	 * @override
	 * @see \Df\StripeClone\P\Reg::k_Excluded()
	 * @used-by \Df\StripeClone\P\Reg::request()
	 * @return string[]
	 */
	protected function k_Excluded():array {return [parent::K_DESCRIPTION];}
}