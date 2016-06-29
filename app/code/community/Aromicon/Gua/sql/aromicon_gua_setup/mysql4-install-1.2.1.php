<?php

$installer = $this;
$installer->startSetup();

# change config values
$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_general/enable'
    WHERE path = 'aromicon_gua/general/enable';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_general/add_to'
    WHERE path = 'aromicon_gua/general/add_to';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_general/account_id'
    WHERE path = 'aromicon_gua/general/account_id';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_general/anonymize_ip'
    WHERE path = 'aromicon_gua/general/anonymize_ip';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_general/force_ssl'
    WHERE path = 'aromicon_gua/general/force_ssl';
    ");

###

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_ecommerce/enable'
    WHERE path = 'aromicon_gua/ecommerce/enable';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_ecommerce/transaction_id'
    WHERE path = 'aromicon_gua/ecommerce/transaction_id';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_ecommerce/checkout_url'
    WHERE path = 'aromicon_gua/ecommerce/checkout_url';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_ecommerce/success_url'
    WHERE path = 'aromicon_gua/ecommerce/success_url';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_ecommerce/funnel_enable'
    WHERE path = 'aromicon_gua/ecommerce/funnel_enable';
    ");

###

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_customer/enable_customergroup'
    WHERE path = 'aromicon_gua/customer/enable_customergroup';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_customer/dimension_customergroup'
    WHERE path = 'aromicon_gua/customer/dimension_customergroup';
    ");

###

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_product/enable_price'
    WHERE path = 'aromicon_gua/product/enable_price';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_product/metric_price'
    WHERE path = 'aromicon_gua/product/metric_price';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_product/enable_availability'
    WHERE path = 'aromicon_gua/product/enable_availability';
    ");

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_product/dimension_availability'
    WHERE path = 'aromicon_gua/product/dimension_availability';
    ");

###

$installer->run("
    UPDATE {$this->getTable('core_config_data')}
    SET path = 'google/aromicon_gua_remarketing/enable'
    WHERE path = 'aromicon_gua/remarketing/enable';
    ");

$installer->endSetup();
