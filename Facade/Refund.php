<?php
namespace Dfe\Spryng\Facade;
use Spryng_PaymentsApiPhp\Object\Refund as R;
// 2017-02-17
final class Refund extends \Df\StripeClone\Facade\Refund {
	/**
	 * 2017-02-17
	 * Метод должен вернуть идентификатор операции (не платежа!) в платёжной системе.
	 * Мы записываем его в БД и затем при обработке оповещений от платёжной системы
	 * смотрим, не было ли это оповещение инициировано нашей же операцией,
	 * и если было, то не обрабатываем его повторно.
	 *
	 * 2017-02-14
	 * Этот же идентификатор должен возвращать @see \Dfe\Spryng\Webhook\Charge\Refunded::eTransId()
	 *
	 * @override
	 * @see \Df\StripeClone\Facade\Refund::transId()
	 * @used-by \Df\StripeClone\Method::_refund()
	 * @param R $r
	 * @return string
	 */
	function transId($r) {return null;}
}