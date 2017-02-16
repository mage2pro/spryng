<?php
namespace Dfe\Spryng\Source;
// 2017-02-16
final class Prefill extends \Df\Config\SourceT {
	/**
	 * 2017-02-16
	 * https://mage2.pro/t/2759
	 * @override
	 * @see \Df\Config\Source::map()
	 * @used-by \Df\Config\Source::toOptionArray()
	 * @return array(string => string)
	 */
	protected function map() {return $this->addKeysToValues([
		'4024007108173153' => 'Visa'
		,'4024007108066423' => 'Visa'
		,'4929877953801082' => 'Visa'
		,'5571197343845659' => 'MasterCard'
		,'5117683643487384' => 'MasterCard'
		,'5387467774336765' => 'MasterCard'
	]);}
}