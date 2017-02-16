// 2017-02-16
define([
	'df', 'Df_StripeClone/main'
], function(df, parent) {'use strict'; return parent.extend({
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
	tokenCheckStatus: function(status) {return null;},

    /**
	 * 2017-02-16
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @param {Object} params
	 * @param {Function} callback
	 * @returns {Function}
	 */
	tokenCreate: function(params, callback) {return null;},

    /**
	 * 2017-02-16
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @param {Object|Number} status
	 * @param {Object} resp
	 * @returns {String}
	 */
	tokenErrorMessage: function(status, resp) {return null;},

    /**
	 * 2017-02-16
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @param {Object} resp
	 * @returns {String}
	 */
	tokenFromResponse: function(resp) {return null;},

    /**
	 * 2017-02-16
	 * @override
	 * @see ...
	 * @used-by placeOrder()
	 * @returns {Object}
	 */
	tokenParams: function() {return null;},

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