<?php
namespace Dfe\Spryng\Source;
use Dfe\Spryng\Settings as S;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
// 2017-02-15
/** @method S ss() */
final class Account extends \Df\Payment\Source\Testable\Api {
	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Payment\Source\Testable\Api::apiKeyName()
	 * @used-by \Df\Payment\Source\Testable\Api::map()
	 * @return string
	 */
	protected function apiKeyName() {return 'PrivateKey';}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Payment\Source\Testable\Api::apiKeyTitle()
	 * @used-by \Df\Payment\Source\Testable\Api::map()
	 * @return string
	 */
	protected function apiKeyTitle() {return 'an API Key';}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Payment\Source\Testable\Api::fetch()
	 * @used-by \Df\Payment\Source\Testable\Api::map()
	 * @param string $token
	 * @return array(string => string)
	 */
	protected function fetch($token) {return df_map_r(function(lAccount $a) {return [
		$a->_id, $a->name
	];}, $this->ss()->api($this->test())->account->getAll());}
}