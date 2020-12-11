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
                CustomFieldsInterface::CHECKOUT_DENUMIRE_FIRMA,
                $customFields->getCheckoutDenumireFirma()
            );
            $cart->setData(
                CustomFieldsInterface::CHECKOUT_CUI,
                $customFields->getCheckoutCui()
            );
            $cart->setData(
                CustomFieldsInterface::CHECKOUT_NR_REG_COM,
                $customFields->getCheckoutNrRegCom()
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

        $this->customFields->setCheckoutDenumireFirma(
            $order->getData(CustomFieldsInterface::CHECKOUT_DENUMIRE_FIRMA)
        );
        $this->customFields->setCheckoutCui(
            $order->getData(CustomFieldsInterface::CHECKOUT_CUI)
        );
        $this->customFields->setCheckoutNrRegCom(
            $order->getData(CustomFieldsInterface::CHECKOUT_NR_REG_COM)
        );

        return $this->customFields;
    }
}
