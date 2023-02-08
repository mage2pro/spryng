<?php
namespace Dfe\Spryng\Facade;
# 2017-02-17
final class O extends \Df\StripeClone\Facade\O {
	/**
	 * 2017-02-17
	 * Spryng PHP SDK declares all the response objects properties as public,
	 * so @uses get_object_vars() (partially) does the job.
	 * Really, there is no way to get the original API response:
	 * https://mage2.pro/t/2818
	 * https://github.com/spryngpayments/php/issues/3
	 * The get_object_vars($o) returns not the same as the original API response: https://mage2.pro/t/2812/2
	 * 2022-11-17
	 * `object` as an argument type is not supported by PHP < 7.2:
	 * https://github.com/mage2pro/core/issues/174#user-content-object
	 * @override
	 * @see \Df\StripeClone\Facade\O::toArray()
	 * @used-by \Df\StripeClone\Method::transInfo()
	 * @param object $o
	 * @return array(string => mixed)
	 */
	function toArray($o):array {return get_object_vars($o);}
}