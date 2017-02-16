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
		var lib = this.url('cdn/jsclient.js');
		require.undef(lib);
		require([lib], function() {jsclient.injectForm(_this.dfForm().get(0), {
			card_number_placeholder: $t('Credit Card Number')
			// 2017-02-16
			// https://github.com/spryngpayments/prestashop/blob/15819af0/views/templates/hook/payment.tpl#L56-L60
			,cardstore_url: _this.url('v1/card/')
			,cvv_placeholder3: $t('Card Verification Number')
			,cvv_placeholder4: $t('Card Verification Number')
			,expiry_placeholder: $t('ММ/YY')
			,no_style: true
			,payment_products: 	['card']
			,'submit_title': $t('Place Order')
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
	},

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