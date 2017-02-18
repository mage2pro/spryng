<?php
// 2017-02-15
namespace Dfe\Spryng\T;
use Dfe\Spryng\Settings as S;
use SpryngPaymentsApiPhp\Object\Card as lCard;
use SpryngPaymentsApiPhp\Object\Transaction as lCharge;
final class Common extends TestCase {
	/** @test 2017-02-15 */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		echo S::s()->publicKey() . "\n";
		echo S::s()->privateKey() . "\n";
	}

	/** 2017-02-15 */
	function t02() {
		/** @var lCard $card */
		$card = $this->api()->card->create([
			'card_number' => '4024007108173153'
			,'cvv' => '123'
			,'expiry_month' => '12'
			,'expiry_year' => '18'
		]);
		/** @var lCharge $transaction */
		$charge = $this->api()->transaction->create([
			'account' => $this->acccountId()
			,'amount' => '10000'
			,'card' => $card->_id
			,'customer_ip' => '127.0.0.1'
			,'dynamic_descriptor' => 'Test transaction'
			// 2017-02-15
			// «The payment product being used»
			// https://www.spryngpayments.com/documentation/credit-cards/
			,'payment_product' => 'card'
			,'user_agent' => 'Mage2.PRO'
		]);
		/** @var lCard $oCard */
		$oCard = $this->api()->card->getById($charge->card->_id);
		echo df_json_encode_pretty($charge);
		// 2017-02-16
		// [Spryng] An example of the «createTransaction» API method response
		// https://mage2.pro/t/2800
	}
}