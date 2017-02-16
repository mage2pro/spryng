// 2017-02-16
define([
	'df', 'Df_Payment/stripeClone', 'jquery', 'mage/translate'
], function(df, parent, $, $t) {'use strict'; return parent.extend({
	// 2017-02-16
	// @used-by mage2pro/core/Payment/view/frontend/web/template/card.html
	defaults: {df: {card: {newTemplate: 'Dfe_Spryng/card/new'}}},
	/**
	 * 2017-02-16
	 * Does Spryng support any other bank cards besides Visa and MasterCard?
	 * https://mage2.pro/t/2796
	 * @returns {String[]}
	 */
	getCardTypes: function() {return ['VI', 'MC'];},
	/**
	 * 2017-02-16
	 * @returns {Object}
	*/
	initialize: function() {
		this._super();
		this.initDf();
		return this;
	},
	/**
	 * 2017-02-16
	 * @used-by initialize()
	 * @used-by placeOrder()
	 * @returns {Promise}
	*/
	initDf: df.c(function() {
		/** @type {Deferred} */
		var deferred = $.Deferred();
		var _this = this;
		/** @type {String} */
		// 2017-02-16
		// https://www.google.com/search?q=%22jsclient.js%22+site%3Aspryngpayments.com
		var lib = 'https://' + (this.isTest() ? 'sandbox' : 'api') + '.spryngpayments.com/cdn/jsclient.js';
		require.undef(lib);
		require([lib], function() {jsclient.injectForm(_this.dfForm().get(0), {
			'submit_title': $t('Place Order')
		});});
		return deferred.promise();
	}),
	/**
	 * 2017-02-16
	 * @override
	 * @see https://github.com/magento/magento2/blob/2.1.0/app/code/Magento/Checkout/view/frontend/web/js/view/payment/default.js#L127-L159
	 * @used-by https://github.com/magento/magento2/blob/2.1.0/lib/web/knockoutjs/knockout.js#L3863
	 * @param {this} _this
	*/
	placeOrder: function(_this) {
		if (this.validate()) {
			this.initDf().done(function() {
			});
		}
	}
});});