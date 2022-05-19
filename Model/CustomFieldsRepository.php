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

namespace Magepow\CheckoutCustomForm\Model;

use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Sales\Model\Order;
use Magepow\CheckoutCustomForm\Api\CustomFieldsRepositoryInterface;
use Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface;


class CustomFieldsRepository implements CustomFieldsRepositoryInterface
{
    /**
     * @var CartRepositoryInterface
     */
    protected $cartRepository;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var CustomFieldsInterface
     */
    protected $customFields;

    /**
     * @param CartRepositoryInterface $cartRepository CartRepositoryInterface
     * @param ScopeConfigInterface    $scopeConfig    ScopeConfigInterface
     * @param CustomFieldsInterface   $customFields   CustomFieldsInterface
     */
    public function __construct(
        CartRepositoryInterface $cartRepository,
        ScopeConfigInterface $scopeConfig,
        CustomFieldsInterface $customFields
    ) {
        $this->cartRepository = $cartRepository;
        $this->scopeConfig    = $scopeConfig;
        $this->customFields   = $customFields;
    }
    /**
     * @param int                                                      $cartId       Cart id
     * @param \Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface $customFields Custom fields
     *
     * @return \Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface
     * @throws CouldNotSaveException
     * @throws NoSuchEntityException
     */
    public function saveCustomFields(
        int $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface {
        $cart = $this->cartRepository->getActive($cartId);
        if (!$cart->getItemsCount()) {
            throw new NoSuchEntityException(__('Cart %1 is empty', $cartId));
        }

        try {
            $cart->setData(
                CustomFieldsInterface::CHECKOUT_DELIVERY_TIME,
                $customFields->getCheckoutDeliveryTime()
            );
            $cart->setData(
                CustomFieldsInterface::CHECKOUT_COLLECTION_SCHEDULE,
                $customFields->getCheckoutCollectionSchedule()
            );
            $cart->setData(
                CustomFieldsInterface::CHECKOUT_DELIVERY_DATE,
                $customFields->getCheckoutDeliveryDate()
            );
            $cart->setData(
                CustomFieldsInterface::CHECKOUT_COLLECTION_TIME,
                $customFields->getCheckoutCollectionTime()
            );
            $cart->setData(
                CustomFieldsInterface::CHECKBOX_BANK_TRANFER,
                $customFields->getCheckboxBankTranfer()
            );
            $cart->setData(
                CustomFieldsInterface::BANK_NAME_ON_ACCOUNT,
                $customFields->getBankNameOnAccount()
            );
            $cart->setData(
                CustomFieldsInterface::BANK_ACCOUNT_NUMBER,
                $customFields->getBankAccountNumber()
            );
            $cart->setData(
                CustomFieldsInterface::BANK_ACCOUNT_SHORT_CODE,
                $customFields->getBankAccountShortCode()
            );

            $cart->setData(
                CustomFieldsInterface::IMEI_TIME,
                $customFields->getImeiTime()
            );


            $this->cartRepository->save($cart);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Custom order data could not be saved!'));
        }

        return $customFields;
    }

    /**
     * @param Order $order Order
     *
     * @return CustomFieldsInterface
     * @throws NoSuchEntityException
     */
    public function getCustomFields(Order $order): CustomFieldsInterface
    {
        if (!$order->getId()) {
            throw new NoSuchEntityException(__('Order %1 does not exist', $order));
        }

        $this->customFields->setCheckoutDeliveryTime(
            $order->getData(CustomFieldsInterface::CHECKOUT_DELIVERY_TIME)
        );
        $this->customFields->setCheckoutCollectionSchedule(
            $order->getData(CustomFieldsInterface::CHECKOUT_COLLECTION_SCHEDULE)
        );
        $this->customFields->setCheckoutDeliveryDate(
            $order->getData(CustomFieldsInterface::CHECKOUT_DELIVERY_DATE)
        );
        $this->customFields->setCheckoutCollectionTime(
            $order->getData(CustomFieldsInterface::CHECKOUT_COLLECTION_TIME)
        );
        $this->customFields->setCheckboxBankTranfer(
            $order->getData(CustomFieldsInterface::CHECKBOX_BANK_TRANFER)
        );
        $this->customFields->setBankNameOnAccount(
            $order->getData(CustomFieldsInterface::BANK_NAME_ON_ACCOUNT)
        );
        $this->customFields->setBankAccountNumber(
            $order->getData(CustomFieldsInterface::BANK_ACCOUNT_NUMBER)
        );
        $this->customFields->setBankAccountShortCode(
            $order->getData(CustomFieldsInterface::BANK_ACCOUNT_SHORT_CODE)
        );

        $this->customFields->setImeiTime(
            $order->getData(CustomFieldsInterface::IMEI_TIME)
        );

        return $this->customFields;
    }
}
