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
namespace Magepow\CheckoutCustomForm\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;
use Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface;


class Uninstall implements UninstallInterface
{
    /**
     * @var SchemaSetupInterface
     */
    protected $setup;

    /**
     * @param SchemaSetupInterface   $setup   SchemaSetupInterface
     * @param ModuleContextInterface $context ModuleContextInterface
     *
     * @return void
     */
    public function uninstall(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $this->setup = $setup->startSetup();
        $this->uninstallQuoteData();
        $this->uninstallSalesData();
        $this->setup = $setup->endSetup();
    }

    /**
     * @return void
     */
    public function uninstallQuoteData()
    {
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('quote'),
            CustomFieldsInterface::CHECKOUT_DENUMIRE_FIRMA
        );
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('quote'),
            CustomFieldsInterface::CHECKOUT_CUI
        );
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('quote'),
            CustomFieldsInterface::CHECKOUT_NR_REG_COM
        );
    }

    /**
     * @return void
     */
    public function uninstallSalesData()
    {
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('sales_order'),
            CustomFieldsInterface::CHECKOUT_DENUMIRE_FIRMA
        );
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('sales_order'),
            CustomFieldsInterface::CHECKOUT_CUI
        );
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('sales_order'),
            CustomFieldsInterface::CHECKOUT_NR_REG_COM
        );
    }
}
