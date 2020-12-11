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

use Magento\Quote\Model\QuoteIdMaskFactory;
use Magepow\CheckoutCustomForm\Api\CustomFieldsGuestRepositoryInterface;
use Magepow\CheckoutCustomForm\Api\CustomFieldsRepositoryInterface;
use Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface;


class CustomFieldsGuestRepository implements CustomFieldsGuestRepositoryInterface
{
    /**
     * @var QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;

    /**
     * @var CustomFieldsRepositoryInterface
     */
    protected $customFieldsRepository;

    /**
     * @param QuoteIdMaskFactory              $quoteIdMaskFactory
     * @param CustomFieldsRepositoryInterface $customFieldsRepository
     */
    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        CustomFieldsRepositoryInterface $customFieldsRepository
    ) {
        $this->quoteIdMaskFactory     = $quoteIdMaskFactory;
        $this->customFieldsRepository = $customFieldsRepository;
    }

    /**
     * @param string                $cartId
     * @param CustomFieldsInterface $customFields
     * @return CustomFieldsInterface
     */
    public function saveCustomFields(
        string $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface {
        $quoteIdMask = $this->quoteIdMaskFactory->create()->load($cartId, 'masked_id');
        return $this->customFieldsRepository->saveCustomFields((int)$quoteIdMask->getQuoteId(), $customFields);
    }
}
