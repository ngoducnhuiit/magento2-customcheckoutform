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
            CustomFieldsInterface::CHECKOUT_DELIVERY_TIME,
            $quote->getData(CustomFieldsInterface::CHECKOUT_DELIVERY_TIME)
        );
        $order->setData(
            CustomFieldsInterface::CHECKOUT_COLLECTION_SCHEDULE,
            $quote->getData(CustomFieldsInterface::CHECKOUT_COLLECTION_SCHEDULE)
        );
        $order->setData(
            CustomFieldsInterface::CHECKOUT_DELIVERY_DATE,
            $quote->getData(CustomFieldsInterface::CHECKOUT_DELIVERY_DATE)
        );

        $order->setData(
            CustomFieldsInterface::CHECKOUT_COLLECTION_TIME,
            $quote->getData(CustomFieldsInterface::CHECKOUT_COLLECTION_TIME)
        );
        $order->setData(
            CustomFieldsInterface::CHECKBOX_BANK_TRANFER,
            $quote->getData(CustomFieldsInterface::CHECKBOX_BANK_TRANFER)
        );
        $order->setData(
            CustomFieldsInterface::BANK_NAME_ON_ACCOUNT,
            $quote->getData(CustomFieldsInterface::BANK_NAME_ON_ACCOUNT)
        );
        $order->setData(
            CustomFieldsInterface::BANK_ACCOUNT_NUMBER,
            $quote->getData(CustomFieldsInterface::BANK_ACCOUNT_NUMBER)
        );
        $order->setData(
            CustomFieldsInterface::BANK_ACCOUNT_SHORT_CODE,
            $quote->getData(CustomFieldsInterface::BANK_ACCOUNT_SHORT_CODE)
        );

        $order->setData(
            CustomFieldsInterface::IMEI_TIME,
            $quote->getData(CustomFieldsInterface::IMEI_TIME)
        );
    }
}
