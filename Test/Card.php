<?php
# 2017-02-18
namespace Dfe\Spryng\Test;
use SpryngPaymentsApiPhp\Object\Card as lCard;
final class Card extends CaseT {
	/** 2017-02-15 @test */
	function t00() {}

	/** 2017-02-15 */
	function t01() {
		/** @var lCard $card */
		$card = $this->api()->card->create([
			'card_number' => '4024007108173153'
			,'cvv' => '123'
			,'expiry_month' => '12'
			,'expiry_year' => '18'
		]);
		print_r(df_json_encode($card));
	}
}