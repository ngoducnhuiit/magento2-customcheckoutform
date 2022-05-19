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

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Sales\Setup\SalesSetupFactory;
use Magento\Framework\DB\Ddl\Table;
use Magepow\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var SalesSetupFactory
     */
    protected $salesSetupFactory;

    /**
     * @var QuoteSetupFactory
     */
    protected $quoteSetupFactory;

    /**
     * @var ModuleDataSetupInterface
     */
    protected $setup;

    /**
     * @param SalesSetupFactory $salesSetupFactory SalesSetupFactory
     * @param QuoteSetupFactory $quoteSetupFactory QuoteSetupFactory
     */
    public function __construct(
        SalesSetupFactory $salesSetupFactory,
        QuoteSetupFactory $quoteSetupFactory
    ) {
        $this->salesSetupFactory = $salesSetupFactory;
        $this->quoteSetupFactory = $quoteSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup   ModuleDataSetupInterface
     * @param ModuleContextInterface   $context ModuleContextInterface
     *
     * @return void
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $this->setup = $setup->startSetup();
        $this->installQuoteData();
        $this->installSalesData();
        $this->setup = $setup->endSetup();
    }

    /**
     * @return void
     */
    public function installQuoteData()
    {
        $quoteInstaller = $this->quoteSetupFactory->create(
            [
                'resourceName' => 'quote_setup',
                'setup' => $this->setup
            ]
        );
        $quoteInstaller
            ->addAttribute(
                'quote',
                CustomFieldsInterface::CHECKOUT_DELIVERY_TIME,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::CHECKOUT_COLLECTION_SCHEDULE,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::CHECKOUT_DELIVERY_DATE,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::CHECKOUT_COLLECTION_TIME,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::CHECKBOX_BANK_TRANFER,
                ['type' => Table::TYPE_BOOLEAN, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::BANK_NAME_ON_ACCOUNT,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::BANK_ACCOUNT_NUMBER,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::BANK_ACCOUNT_SHORT_CODE,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            )->addAttribute(
                'quote',
                CustomFieldsInterface::IMEI_TIME,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true]
            );
    }

    /**
     * @return void
     */
    public function installSalesData()
    {
        $salesInstaller = $this->salesSetupFactory->create(
            [
                'resourceName' => 'sales_setup',
                'setup' => $this->setup
            ]
        );
        $salesInstaller
            ->addAttribute(
                'order',
                CustomFieldsInterface::CHECKOUT_DELIVERY_TIME,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::CHECKOUT_COLLECTION_SCHEDULE,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::CHECKOUT_DELIVERY_DATE,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::CHECKOUT_COLLECTION_TIME,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::CHECKBOX_BANK_TRANFER,
                ['type' => Table::TYPE_BOOLEAN, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::BANK_NAME_ON_ACCOUNT,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::BANK_ACCOUNT_NUMBER,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::BANK_ACCOUNT_SHORT_CODE,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            )->addAttribute(
                'order',
                CustomFieldsInterface::IMEI_TIME,
                ['type' => Table::TYPE_TEXT, 'length' => '255', 'nullable' => true, 'grid' => false]
            );
    }
}
