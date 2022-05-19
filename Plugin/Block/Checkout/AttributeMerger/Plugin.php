<?php
namespace Magepow\CheckoutCustomForm\Plugin\Block\Checkout\AttributeMerger;

class Plugin
{
  public function afterMerge(\Magento\Checkout\Block\Checkout\AttributeMerger $subject, $result)
  {
    
    $result['street']['children'][0]['placeholder'] = __('Line 1');
    $result['street']['children'][1]['placeholder'] = __('Line 2');
    $result['street']['children'][2]['placeholder'] = __('Line 3');
    return $result;
  }
}