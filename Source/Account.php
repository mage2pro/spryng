<?php
namespace Dfe\Spryng\Source;
use Dfe\Spryng\Settings as S;
use SpryngPaymentsApiPhp\Object\Account as lAccount;
# 2017-02-15
/** @method S ss() */
final class Account extends \Df\Payment\Source\API\Key\Testable {
	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Config\Source\API\Key::apiKeyName()
	 * @used-by \Df\Config\Source\API\Key::isRequirementMet()
	 * @return string
	 */
	protected function apiKeyName() {return $this->tkey('PrivateKey');}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Config\Source\API\Key::apiKeyTitle()
	 * @used-by \Df\Config\Source\API\Key::requirement()
	 * @return string
	 */
	protected function apiKeyTitle() {return 'an API Key';}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Config\Source\API::fetch()
	 * @used-by \Df\Config\Source\API::map()
	 * @return array(string => string)
	 */
	protected function fetch():array {return df_map_r(function(lAccount $a) {return [
		$a->_id, $a->name
	];}, $this->ss()->api($this->test())->account->getAll());}
}