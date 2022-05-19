<?php
namespace Magepow\CheckoutCustomForm\Block\Checkout;



class Success extends \Magento\Framework\View\Element\Template
{
   
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $_checkoutSession;

    /**
     * Info constructor.
     * @param TemplateContext $context
     * @param Registry $registry
     * @param PaymentHelper $paymentHelper
     * @param AddressRenderer $addressRenderer
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_checkoutSession = $checkoutSession;
    }

    /**
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
	return $this->_checkoutSession->getLastRealOrder();
    }

}