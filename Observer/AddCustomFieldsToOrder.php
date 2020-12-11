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

namespace Magepow\CheckoutCustomForm\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface;


class AddCustomFieldsToOrder implements ObserverInterface
{
    /**
     * @param Observer $observer Observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        $order->setData(
            CustomFieldsInterface::CHECKOUT_DENUMIRE_FIRMA,
            $quote->getData(CustomFieldsInterface::CHECKOUT_DENUMIRE_FIRMA)
        );
        $order->setData(
            CustomFieldsInterface::CHECKOUT_CUI,
            $quote->getData(CustomFieldsInterface::CHECKOUT_CUI)
        );
        $order->setData(
            CustomFieldsInterface::CHECKOUT_NR_REG_COM,
            $quote->getData(CustomFieldsInterface::CHECKOUT_NR_REG_COM)
        );
    }
}
