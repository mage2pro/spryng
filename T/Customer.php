<?php
// 2017-02-18
namespace Dfe\Spryng\T;
use SpryngPaymentsApiPhp\Object\Card as lCard;
use SpryngPaymentsApiPhp\Object\Customer as lCustomer;
final class Customer extends TestCase {
	/** @test 2017-02-15 */
	function t00() {}

	/** 2017-02-18 */
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
			,'organisation' => 'Mage2.PRO'
			,'organisation_name' => 'Mage2.PRO'
			,'phone_number' => '+46850506000'
			,'postal_code' => '111 64'
			,'region' => 'Stockholm'
			// 2017-02-18
			// https://mage2.pro/t/2566
			,'social_security_number' => '410321-9202'
			,'street_address' => 'Nils Ericsons Plan 4'
			,'title' => 'mr'
		]);
	}
}