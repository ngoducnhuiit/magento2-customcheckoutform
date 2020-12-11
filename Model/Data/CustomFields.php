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
    public function getCheckoutDenumireFirma()
    {
        return $this->_get(self::CHECKOUT_DENUMIRE_FIRMA);
    }

    /**
     * @return string|null
     */
    public function getCheckoutCui()
    {
        return $this->_get(self::CHECKOUT_CUI);
    }

    /**
     * @return string|null
     */
    public function getCheckoutNrRegCom()
    {
        return $this->_get(self::CHECKOUT_NR_REG_COM);
    }



    /**
     * @param string|null $checkoutDenumireFirma Denumire Firma
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutDenumireFirma(string $checkoutDenumireFirma = null)
    {
        return $this->setData(self::CHECKOUT_DENUMIRE_FIRMA, $checkoutDenumireFirma);
    }

    /**
     * @param string|null $checkoutCui CUI
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutCui(string $checkoutCui = null)
    {
        return $this->setData(self::CHECKOUT_CUI, $checkoutCui);
    }

    /**
     * @param string|null $checkoutNrRegCom Nr. Reg. Com.
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutNrRegCom(string $checkoutNrRegCom = null)
    {
        return $this->setData(self::CHECKOUT_NR_REG_COM, $checkoutNrRegCom);
    }




}
