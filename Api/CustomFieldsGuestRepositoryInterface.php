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

namespace Magepow\CheckoutCustomForm\Api;

use Magento\Sales\Model\Order;
use Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface;


interface CustomFieldsGuestRepositoryInterface
{
    /**
     * @param string                                                   $cartId       Guest Cart id
     * @param \Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface $customFields Custom fields
     *
     * @return \Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(
        string $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface;
}
