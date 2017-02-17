// 2017-02-16
define([
	'df', 'Df_StripeClone/main', 'jquery'
], function(df, parent, $) {'use strict'; return parent.extend({
	/**
	 * 2017-02-16
	 * Does Spryng support any other bank cards besides Visa and MasterCard?
	 * https://mage2.pro/t/2796
	 * @returns {String[]}
	 */
	getCardTypes: function() {return ['VI', 'MC', 'AE', 'JCB', 'DI', 'DN'];},

	/**
	 * 2017-02-16
	 * @override
	 * @see https://github.com/mage2pro/core/blob/2.0.11/StripeClone/view/frontend/web/main.js?ts=4#L12-L19
	 * @used-by placeOrder()
	 * @param {Boolean} status
	 * @returns {Boolean}
	 */
	tokenCheckStatus: function(status) {return status;},

	/**
	 * 2017-02-16
	 * How to submit the Spryng bank card form programmatically? https://mage2.pro/t/2799
	 * @override
	 * @see https://github.com/mage2pro/core/blob/2.0.11/StripeClone/view/frontend/web/main.js?ts=4#L21-L29
	 * @used-by placeOrder()
	 * @param {Object} params
	 * @param {Function} callback
	 * @returns {Function}
	 */
	tokenCreate: function(params, callback) {
		$.ajax(this.url('card'), {
			complete: function(ajax, status) {
				if ('error' === status) {
					/** @type {Object} */
					var resp = JSON.parse(ajax.responseText);
					callback(false, df.s.ucFirst(resp.message) + ":<br/>" +
						 $.map(resp.details, function(v, k) {return df.s.t(
							'<b>{0}</b>: {1}.', k, v
						 );}).join("<br/>")
					);
				}
			}
			,contentType: 'application/json; charset=utf-8'
			,data: JSON.stringify(params)
			,dataType: 'json'
			,method: 'POST'
			// 2017-02-16
			// Токен имеет вид: «58a5b584b7f62b51618718fd».
			,success: function(data) {callback(true, data._id);}
		});
		return null;
	},

	/**
	 * 2017-02-16
	 * @override
	 * @see https://github.com/mage2pro/core/blob/2.0.11/StripeClone/view/frontend/web/main.js?ts=4#L31-L39
	 * @used-by placeOrder()
	 * @param {Object|Number} status
	 * @param {String} resp
	 * @returns {String}
	 */
	tokenErrorMessage: function(status, resp) {return resp;},

	/**
	 * 2017-02-16
	 * @override
	 * @see https://github.com/mage2pro/core/blob/2.0.11/StripeClone/view/frontend/web/main.js?ts=4#L41-L48
	 * @used-by placeOrder()
	 * @param {String} resp
	 * @returns {String}
	 */
	tokenFromResponse: function(resp) {return resp;},

	/**
	 * 2017-02-16
	 * How to submit the Spryng bank card form programmatically? https://mage2.pro/t/2799
	 * @override
	 * @see https://github.com/mage2pro/core/blob/2.0.11/StripeClone/view/frontend/web/main.js?ts=4#L50-L56
	 * @used-by placeOrder()
	 * @returns {Object}
	 */
	tokenParams: function() {return {
		cvv: this.creditCardVerificationNumber()
		,expiry_month: this.creditCardExpMonth()
		,expiry_year: this.creditCardExpYear2()
		,card_number: this.creditCardNumber()
	};},

	/**
	 * 2017-02-16
	 * @private
	 * @used-by initDf()
	 * @param {String} suffix
	 * @returns {String}
	 */
	url: function(suffix) {return df.s.t('https://{0}.spryngpayments.com/v1/{1}',
		this.isTest() ? 'sandbox' : 'api', suffix
	);}
});});