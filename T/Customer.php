<?php
// 2017-02-18
namespace Dfe\Spryng\T;
use SpryngPaymentsApiPhp\Object\Card as lCard;
use SpryngPaymentsApiPhp\Object\Customer as lCustomer;
final class Customer extends TestCase {
	/** 2017-02-15 */
	function t00() {}

	/** @test 2017-02-18 */
	function t01() {
		/** @var lCustomer $customer */
		$customer = $this->api()->customer->create([
			'city' => 'Stockholm'
			,'country_code' => 'SE'
			,'date_of_birth' => '1982-07-08'
			,'email_address' => 'admin@mage2.pro'
			,'first_name' => 'Dmitry'
			,'gender' => 'male'
			,'last_name' => 'Fedyuk'
			// 2017-02-18
			// [Spryng] The documentation says that the «organisation» is a required parameter
			// of a «createCustomer» API request, but really the request works without it:
			// https://mage2.pro/t/2844
			//,'organisation' => 'Mage2.PRO'
			// 2017-02-18
			// Нельзя передавать одновременно и имя, и название организации.
			//,'organisation_name' => 'Mage2.PRO'
			,'phone_number' => '+46850506000'
			,'postal_code' => '111 64'
			,'region' => 'Stockholm'
			// 2017-02-18
			// https://mage2.pro/t/2566
			// Этот параметр необязателен.
			,'social_security_number' => '410321-9202'
			,'street_address' => 'Nils Ericsons Plan 4'
			,'title' => 'mr'
		]);
		echo df_json_encode_pretty($customer);
	}
}