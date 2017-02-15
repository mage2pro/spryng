<?php
namespace Dfe\Spryng\Source;
// 2017-02-15
final class Account extends \Df\Config\Source\Testable\Api {
	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Config\Source\Testable\Api::apiKeyName()
	 * @used-by \Df\Config\Source\Testable\Api::map()
	 * @return string
	 */
	protected function apiKeyName() {return 'PrivateKey';}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Config\Source\Testable\Api::apiKeyTitle()
	 * @used-by \Df\Config\Source\Testable\Api::map()
	 * @return string
	 */
	protected function apiKeyTitle() {return 'an API Key';}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Config\Source\Testable\Api::exception()
	 * @used-by \Df\Config\Source\Testable\Api::map()
	 * @param \Exception $e
	 * @return array(string => string)
	 */
	protected function exception(\Exception $e) {return ['error' => $e->getMessage()];}

	/**
	 * 2017-02-15
	 * @override
	 * @see \Df\Config\Source\Testable\Api::fetch()
	 * @used-by \Df\Config\Source\Testable\Api::map()
	 * @param string $token
	 * @return array(string => string)
	 */
	protected function fetch($token) {return [];}
}