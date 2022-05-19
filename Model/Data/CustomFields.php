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

namespace Magepow\CheckoutCustomForm\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

class CustomFields extends AbstractExtensibleObject implements CustomFieldsInterface
{
    /**
     * @return string|null
     */
    public function getCheckoutDeliveryTime()
    {
        return $this->_get(self::CHECKOUT_DELIVERY_TIME);
    }

    /**
     * @return string|null
     */
    public function getCheckoutCollectionSchedule()
    {
        return $this->_get(self::CHECKOUT_COLLECTION_SCHEDULE);
    }

    /**
     * @return string|null
     */
    public function getCheckoutDeliveryDate()
    {
        return $this->_get(self::CHECKOUT_DELIVERY_DATE);
    }

    /**
     * @return string|null
     */
    public function getCheckoutCollectionTime()
    {
        return $this->_get(self::CHECKOUT_COLLECTION_TIME);
    }

    /**
     * @return string|null
     */
    public function getCheckboxBankTranfer()
    {
        return $this->_get(self::CHECKBOX_BANK_TRANFER);
    }

    /**
     * @return string|null
     */
    public function getBankNameOnAccount()
    {
        return $this->_get(self::BANK_NAME_ON_ACCOUNT);
    }

    /**
     * @return string|null
     */
    public function getBankAccountNumber()
    {
        return $this->_get(self::BANK_ACCOUNT_NUMBER);
    }

    /**
     * @return string|null
     */
    public function getBankAccountShortCode()
    {
        return $this->_get(self::BANK_ACCOUNT_SHORT_CODE);
    }

    /**
     * @return string|null
     */
    public function getImeiTime()
    {
        return $this->_get(self::IMEI_TIME);
    }


    /**
     * @param string|null $checkoutDeliveryTime 
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutDeliveryTime(string $checkoutDeliveryTime = null)
    {
        return $this->setData(self::CHECKOUT_DELIVERY_TIME, $checkoutDeliveryTime);
    }
    

    /**
     * @param string|null $checkoutCollectionSchedule 
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutCollectionSchedule(string $checkoutCollectionSchedule = null)
    {
        return $this->setData(self::CHECKOUT_COLLECTION_SCHEDULE, $checkoutCollectionSchedule);
    }

    /**
     * @param string|null $checkoutDeliveryDate 
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutDeliveryDate(string $checkoutDeliveryDate = null)
    {
        return $this->setData(self::CHECKOUT_DELIVERY_DATE, $checkoutDeliveryDate);
    }

    /**
     * @param string|null $checkoutCollectionTime 
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutCollectionTime(string $checkoutCollectionTime = null)
    {
        return $this->setData(self::CHECKOUT_COLLECTION_TIME, $checkoutCollectionTime);
    }

    /**
     * @param string|null $checkboxBankTranfer 
     *
     * @return CustomFieldsInterface
     */
    public function setCheckboxBankTranfer(string $checkboxBankTranfer = null)
    {
        return $this->setData(self::CHECKBOX_BANK_TRANFER, $checkboxBankTranfer);
    }

    /**
     * @param string|null $bankNameOnAccount 
     *
     * @return CustomFieldsInterface
     */
    public function setBankNameOnAccount(string $bankNameOnAccount = null)
    {
        return $this->setData(self::BANK_NAME_ON_ACCOUNT, $bankNameOnAccount);
    }

    /**
     * @param string|null $bankAccountNumber 
     *
     * @return CustomFieldsInterface
     */
    public function setBankAccountNumber(string $bankAccountNumber = null)
    {
        return $this->setData(self::BANK_ACCOUNT_NUMBER, $bankAccountNumber);
    }

    /**
     * @param string|null $bankAccountShortCode 
     *
     * @return CustomFieldsInterface
     */
    public function setBankAccountShortCode(string $bankAccountShortCode = null)
    {
        return $this->setData(self::BANK_ACCOUNT_SHORT_CODE, $bankAccountShortCode);
    }

    /**
     * @param string|null $imeiTime 
     *
     * @return CustomFieldsInterface
     */
    public function setImeiTime(string $imeiTime = null)
    {
        return $this->setData(self::IMEI_TIME, $imeiTime);
    }


}
