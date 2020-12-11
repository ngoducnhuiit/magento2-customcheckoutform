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

namespace Magepow\CheckoutCustomForm\Plugin\Block\Adminhtml;

use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Block\Adminhtml\Order\View\Info;
use Magepow\CheckoutCustomForm\Api\CustomFieldsRepositoryInterface;


class CustomFields
{
    /**
     * @var CustomFieldsRepositoryInterface
     */
    protected $customFieldsRepository;

    /**
     * @param CustomFieldsRepositoryInterface $customFieldsRepository Repository Interface
     */
    public function __construct(CustomFieldsRepositoryInterface $customFieldsRepository)
    {
        $this->customFieldsRepository = $customFieldsRepository;
    }

    /**
     * @param Info   $subject Info
     * @param string $result  Result
     *
     * @return string
     * @throws LocalizedException
     */
    public function afterToHtml(Info $subject, $result) {
        $block = $subject->getLayout()->getBlock('order_custom_fields');
        if ($block !== false) {
            $block->setOrderCustomFields(
                $this->customFieldsRepository->getCustomFields($subject->getOrder())
            );
            $result = $result . $block->toHtml();
        }

        return $result;
    }
}
