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
    const CHECKOUT_DENUMIRE_FIRMA = 'checkout_denumire_firma';
    const CHECKOUT_CUI = 'checkout_cui';
    const CHECKOUT_NR_REG_COM = 'checkout_nr_reg_com';


    /**
     * @return string|null
     */
    public function getCheckoutDenumireFirma();

    /**
     * @return string|null
     */
    public function getCheckoutCui();

    /**
     * @return string|null
     */
    public function getCheckoutNrRegCom();


    /**
     * @param string|null $checkoutDenumireFirma Denumire Firma
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutDenumireFirma(string $checkoutDenumireFirma = null);

    /**
     * @param string|null $checkoutCui CUI
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutCui(string $checkoutCui = null);

    /**
     * @param string|null $checkoutNrRegCom Nr. Reg. Com.
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutNrRegCom(string $checkoutNrRegCom = null);



}
