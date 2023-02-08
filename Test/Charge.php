<?php
# 2017-02-18
namespace Dfe\Spryng\Test;
use SpryngPaymentsApiPhp\Object\Card as lCard;
use SpryngPaymentsApiPhp\Object\Transaction as lCharge;
final class Charge extends CaseT {
	/** 2017-02-15 @test */
	function t00():void {}

	/** 2017-02-15 */
	function t01_refund():void {
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
			,'dynamic_descriptor' => 'MAGE2PRO'
			# 2017-02-15
			# «The payment product being used»
			# https://www.spryngpayments.com/documentation/credit-cards/
			,'payment_product' => 'card'
			,'user_agent' => 'Mage2.PRO'
		]);
		$this->api()->transaction->refund($charge->_id, '5000', 'A reason.');
		/** @var lCard $oCard */
		$oCard = $this->api()->card->getById($charge->card->_id);
		print_r(df_json_encode($charge));
		# 2017-02-16
		# [Spryng] An example of the «createTransaction» API method response
		# https://mage2.pro/t/2800
	}

	/**
	 * 2017-02-19
	 * [Spryng] An example of the «captureTransaction» API method response
	 * https://mage2.pro/t/2850
	 */
	function t02_auth_and_capture():void {
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
			,'capture_now' => false
			,'customer_ip' => '127.0.0.1'
			,'dynamic_descriptor' => 'MAGE2PRO'
			# 2017-02-15
			# «The payment product being used»
			# https://www.spryngpayments.com/documentation/credit-cards/
			,'payment_product' => 'card'
			,'user_agent' => 'Mage2.PRO'
		]);
		$charge = $this->api()->transaction->capture($charge->_id);
		print_r(df_json_encode($charge));
	}

	/**
	 * 2017-02-19
	 * https://api.spryngpayments.com/v1/#operation/captureTransaction
	 * [Spryng] An example of the «captureTransaction» API method response: https://mage2.pro/t/2850
	 */
	function t03_auth_and_capture_partial() {
		$a = 10000;
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
			,'amount' => $a
			,'card' => $card->_id
			,'capture_now' => false
			,'customer_ip' => '127.0.0.1'
			,'dynamic_descriptor' => 'MAGE2PRO'
			# 2017-02-15
			# «The payment product being used»
			# https://www.spryngpayments.com/documentation/credit-cards/
			,'payment_product' => 'card'
			,'user_agent' => 'Mage2.PRO'
		]);
		$charge = $this->api()->transaction->capture($charge->_id, $a / 2);
		print_r(df_json_encode($charge));
	}

	/**
	 * 2017-02-19
	 * https://api.spryngpayments.com/v1/#operation/voidAuthTransaction
	 * [Spryng] An example of the «voidAuthTransaction» API method response: https://mage2.pro/t/2851
	 */
	function t04_auth_and_void() {
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
			,'amount' => 10000
			,'card' => $card->_id
			,'capture_now' => false
			,'customer_ip' => '127.0.0.1'
			,'dynamic_descriptor' => 'MAGE2PRO'
			# 2017-02-15
			# «The payment product being used»
			# https://www.spryngpayments.com/documentation/credit-cards/
			,'payment_product' => 'card'
			,'user_agent' => 'Mage2.PRO'
		]);
		$charge = $this->api()->transaction->void($charge->_id);
		print_r(df_json_encode($charge));
	}
}