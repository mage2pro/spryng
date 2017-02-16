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
	 * @see ...
	 * @used-by placeOrder()
	 * @param {Object|Number} status
	 * @returns {Boolean}
	 */
	tokenCheckStatus: function(status) {
		debugger;
		return null;
	},

    /**
	 * 2017-02-16
	 * How to submit the Spryng bank card form programmatically? https://mage2.pro/t/2799
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @param {Object} params
	 * @param {Function} callback
	 * @returns {Function}
	 */
	tokenCreate: function(params, callback) {
		$.ajax(this.url('card'), {
			contentType: 'application/json; charset=utf-8'
			,data: JSON.stringify(params)
			,dataType: 'json'
			,failure: function(message) {
				debugger;
				callback(false, message);
			}
			,method: 'POST'
			,success: function(data) {
				debugger;
				callback(true, data);
			}
		});
		return null;
	},

    /**
	 * 2017-02-16
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @param {Object|Number} status
	 * @param {Object} resp
	 * @returns {String}
	 */
	tokenErrorMessage: function(status, resp) {
		debugger;
		return null;
	},

    /**
	 * 2017-02-16
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @param {Object} resp
	 * @returns {String}
	 */
	tokenFromResponse: function(resp) {
		debugger;
		return null;
	},

    /**
	 * 2017-02-16
	 * How to submit the Spryng bank card form programmatically? https://mage2.pro/t/2799
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @returns {Object}
	 */
	tokenParams: function() {return {
		cvv: this.creditCardVerificationNumber()
		,expiry_month: this.creditCardExpMonth()
		,expiry_year: this.creditCardExpYear()
		,card_number: this.creditCardNumber()
	};},

  	/**
	 * 2017-02-16
	 * @private
	 * @used-by initDf()
	 * @param {String} suffix
	 * @returns {String}
	 */
	url: function(suffix) { return(
		'https://' + (this.isTest() ? 'sandbox' : 'api') + '.spryngpayments.com/' + suffix
	);}
});});