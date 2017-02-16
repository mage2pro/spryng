// 2017-02-16
define([
	'Df_Payment/card'
], function(parent) {'use strict'; return parent.extend({
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
		return this;
	},
	/**
	 * 2017-02-16
	 * @override
	 * @see https://github.com/magento/magento2/blob/2.1.0/app/code/Magento/Checkout/view/frontend/web/js/view/payment/default.js#L127-L159
	 * @used-by https://github.com/magento/magento2/blob/2.1.0/lib/web/knockoutjs/knockout.js#L3863
	 * @param {this} _this
	*/
	placeOrder: function(_this) {
		if (this.validate()) {}
	}
});});