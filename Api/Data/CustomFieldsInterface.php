<?php
/**
 * @copyright Copyright © 2020 Magepow. All rights reserved.
 * @author    Magepow
 * @category Magepow
 * @copyright Copyright (c) 2014 Magepow (<https://www.magepow.com>)
 * @license <https://www.magepow.com/license-agreement.html>
 * @Author: magepow<support@magepow.com>
 * @github: <https://github.com/magepow>
 */

namespace Magepow\CheckoutCustomForm\Api\Data;

interface CustomFieldsInterface
{
    const CHECKOUT_COLLECTION_SCHEDULE = 'checkout_collection_schedule';
    const CHECKOUT_DELIVERY_TIME = 'checkout_delivery_time';
    const CHECKOUT_DELIVERY_DATE = 'checkout_delivery_date';
    const CHECKOUT_COLLECTION_TIME = 'checkout_collection_time';

    const CHECKBOX_BANK_TRANFER = 'checkbox_bank_tranfer';
    const BANK_NAME_ON_ACCOUNT = 'bank_name_on_account';
    const BANK_ACCOUNT_NUMBER = 'bank_account_number';
    const BANK_ACCOUNT_SHORT_CODE = 'bank_account_short_code';
    
    const IMEI_TIME = 'imei_time';


    /**
     * @return string|null
     */
    public function getCheckoutDeliveryTime();

    /**
     * @return string|null
     */
    public function getCheckoutCollectionSchedule();

    /**
     * @return string|null
     */
    public function getCheckoutDeliveryDate();

    /**
     * @return string|null
     */
    public function getCheckoutCollectionTime();

    /**
     * @return string|null
     */
    public function getCheckboxBankTranfer();

    /**
     * @return string|null
     */
    public function getBankNameOnAccount();

    /**
     * @return string|null
     */
    public function getBankAccountNumber();

    /**
     * @return string|null
     */
    public function getBankAccountShortCode();

    /**
     * @return string|null
     */
    public function getImeiTime();


    /**
     * @param string|null $checkoutDeliveryTime
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutDeliveryTime(string $checkoutDeliveryTime = null);

    /**
     * @param string|null $checkoutCollectionSchedule
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutCollectionSchedule(string $checkoutCollectionSchedule = null);

    /**
     * @param string|null $checkoutDeliveryDate
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutDeliveryDate(string $checkoutDeliveryDate = null);

    /**
     * @param string|null $checkoutCollectionTime
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutCollectionTime(string $checkoutCollectionTime = null);


    /**
     * @param string|null $checkboxBankTranfer
     *
     * @return CustomFieldsInterface
     */
    public function setCheckboxBankTranfer(string $checkboxBankTranfer = null);

    /**
     * @param string|null $bankNameOnAccount
     *
     * @return CustomFieldsInterface
     */
    public function setBankNameOnAccount(string $bankNameOnAccount = null);

    /**
     * @param string|null $bankAccountNumber
     *
     * @return CustomFieldsInterface
     */
    public function setBankAccountNumber(string $bankAccountNumber = null);

    /**
     * @param string|null $bankAccountShortCode
     *
     * @return CustomFieldsInterface
     */
    public function setBankAccountShortCode(string $bankAccountShortCode = null);


    /**
     * @param string|null $imeiTime
     *
     * @return CustomFieldsInterface
     */
    public function setImeiTime(string $imeiTime = null);

}
