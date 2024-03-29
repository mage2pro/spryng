<?php
namespace Dfe\Spryng\Facade;
use Spryng_PaymentsApiPhp\Object\Refund as R;
# 2017-02-17
final class Refund extends \Df\StripeClone\Facade\Refund {
	/**
	 * 2017-02-17
	 * Метод должен вернуть идентификатор операции (не платежа!) в платёжной системе.
	 * Мы записываем его в БД и затем при обработке оповещений от платёжной системы
	 * смотрим, не было ли это оповещение инициировано нашей же операцией,
	 * и если было, то не обрабатываем его повторно.
	 * @override
	 * @see \Df\StripeClone\Facade\Refund::transId()
	 * @used-by \Df\StripeClone\Method::_refund()
	 * @param R $r
	 */
	function transId($r):string {return '';}
}