<?php
class Aromicon_Gua_Block_Gua extends Mage_Core_Block_Template
{
    public $_order;

    public function getAccountId()
    {
        return Mage::getStoreConfig('google/aromicon_gua_general/account_id');
    }

    public function isAnonymizeIp()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_general/anonymize_ip') ? 'true' : 'false';
    }

    public function isActive()
    {
        if(Mage::getStoreConfigFlag('google/aromicon_gua_general/enable')
            && Mage::getStoreConfig('google/aromicon_gua_general/add_to') == $this->getParentBlock()->getNameInLayout()){
                return true;
        }
        return false;
    }

    public function isEcommerce()
    {
        $successPath =  Mage::getStoreConfig('google/aromicon_gua_ecommerce/success_url') != "" ? Mage::getStoreConfig('google/aromicon_gua_ecommerce/success_url') : '/checkout/onepage/success';
        if(Mage::getStoreConfigFlag('google/aromicon_gua_ecommerce/enable')
            && strpos($this->getRequest()->getPathInfo(), $successPath) !== false){
                return true;
        }
        return false;
    }

    public function isCheckout()
    {
        $checkoutPath =  Mage::getStoreConfig('google/aromicon_gua_ecommerce/checkout_url') != "" ?  Mage::getStoreConfig('google/aromicon_gua_ecommerce/checkout_url') : '/checkout/onepage';
        if(Mage::getStoreConfigFlag('google/aromicon_gua_ecommerce/funnel_enable')
            && strpos($this->getRequest()->getPathInfo(), $checkoutPath) !== false){
            return true;
        }
        return false;
    }

    public function getCheckoutUrl()
    {
       return Mage::getStoreConfig('google/aromicon_gua_ecommerce/checkout_url') != "" ?  Mage::getStoreConfig('google/aromicon_gua_ecommerce/checkout_url') : '/checkout/onepage';
    }

    public function getActiveStep()
    {
        return Mage::getSingleton('customer/session')->isLoggedIn() ? 'billing' : 'login';
    }

    public function isSSL()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_general/force_ssl');
    }

    /**
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        if(!isset($this->_order)){
            $orderId = Mage::getSingleton('checkout/session')->getLastOrderId();
            $this->_order = Mage::getModel('sales/order')->load($orderId);
        }
        return $this->_order;
    }

    public function getTransactionIdField()
    {
        return Mage::getStoreConfig('google/aromicon_gua_ecommerce/transaction_id') != false ? Mage::getStoreConfig('google/aromicon_gua_ecommerce/transaction_id') : 'entity_id';
    }

    public function isCustomerGroup()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_customer/enable_customergroup') && $this->getCustomerGroupDimensionId() != '';
    }

    public function getCustomerGroupDimensionId()
    {
        return Mage::getStoreConfig('google/aromicon_gua_customer/dimension_customergroup');
    }

    public function getCustomerGroup()
    {
        $groupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
        return Mage::getModel('customer/group')->load($groupId)->getCode();
    }

    public function isFirstPurchase()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_customer/enable_first_order') && $this->getFirstPurchaseDimensionId() !='';
    }

    public function getFirstPurchaseDimensionId()
    {
        return Mage::getStoreConfig('google/aromicon_gua_customer/dimension_first_purchase');
    }

    public function isNumberOfPurchase()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_customer/enable_customer_orders') && $this->getNumberOfPurchaseMetricId() !='';
    }

    public function getNumberOfPurchaseMetricId()
    {
        return Mage::getStoreConfig('google/aromicon_gua_customer/metric_customer_orders');
    }

    public function getNumberOfOrders()
    {
        return Mage::getResourceModel('sale/order_collection')
            ->addFieldToFilter('customer_email', array('eq' => $this->getOrder()->getCustomerEmail()))
            ->getSize();
    }

    public function isRemarketing()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_remarketing/enable');
    }

    public function isPriceTracking()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_product/enable_price') && $this->getPriceMetricId() !='';
    }

    public function getPriceMetricId()
    {
        return Mage::getStoreConfig('google/aromicon_gua_product/metric_price');
    }

    public function isAvailabilityTracking()
    {
        return Mage::getStoreConfigFlag('google/aromicon_gua_product/enable_availability') && Mage::getStoreConfig('google/aromicon_gua_product/dimension_availability') != '';
    }

    public function getAvailabilityDimensionId()
    {
        return Mage::getStoreConfig('google/aromicon_gua_product/dimension_availability');
    }

    /**
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        return Mage::registry('current_product');
    }
}