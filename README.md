The module integrates a Magento 2 based webstore with the **[Spryng](https://www.spryngpayments.com)** payment service (the Netherlands).  
The module is **free** and **open source**.

## Screenshots
### 1. Frontend. The payment form
![](https://mage2.pro/uploads/default/original/2X/6/68f251cf13e37438f6da619d173a0c0dcdb7e1ff.png)

### 2. Backend. The extension's settings
![](https://mage2.pro/uploads/default/original/2X/7/73b606d2785a0664780dfd19cc7819080ca34a31.png)1

## Demo videos
1. [**Capture** a card payment](https://mage2.pro/t/2853).
2. [**Authorize** a card payment, and **capture** it from the **Magento** side](https://mage2.pro/t/2854).
3. [**Authorize** a card payment, and **void** it from the **Magento** side](https://mage2.pro/t/2857).

## How to install
[Hire me in Upwork](https://upwork.com/fl/mage2pro), and I will: 
- install and configure the module properly on your website
- answer your questions
- solve compatiblity problems with third-party checkout, shipping, marketing modules
- implement new features you need 

### 2. Self-installation
```
bin/magento maintenance:enable
rm -f composer.lock
composer clear-cache
composer require mage2pro/spryng:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f nl_NL en_US <additional locales, e.g.: de_DE>
bin/magento maintenance:disable
```

## How to update
```
bin/magento maintenance:enable
composer remove mage2pro/spryng
rm -f composer.lock
composer clear-cache
composer require mage2pro/spryng:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f nl_NL en_US <additional locales, e.g.: de_DE>
bin/magento maintenance:disable
```