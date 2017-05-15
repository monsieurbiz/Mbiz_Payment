<?php
/**
 * This file is part of Mbiz_Payment for Magento.
 *
 * @license MIT
 * @author Maxime Huran <m.huran@monsieurbiz.com> <@MaximeHuran>
 * @category Mbiz
 * @package Mbiz_Payment
 * @copyright Copyright (c) 2017 Monsieur Biz (https://monsieurbiz.com/)
 */

/**
 * Data Helper
 * @package Mbiz_Payment
 */
class Mbiz_Payment_Helper_Data extends Mage_Payment_Helper_Data
{
    /**
     * Retrieve method model object
     *
     * @param   string $code
     * @return  Mage_Payment_Model_Method_Abstract|false
     */
    public function getMethodInstance($code)
    {
        $key = self::XML_PATH_PAYMENT_METHODS . '/' . $code . '/model';
        $class = Mage::getStoreConfig($key);

        // If the payment exists, return it (Like native behaviour)
        $methodInstance = Mage::getModel($class);
        if ($methodInstance !== false) {
            return $methodInstance;
        }

        // Check if config has got replaced payment methods
        $replacedPaymentMethods = Mage::getStoreConfig(self::XML_PATH_PAYMENT_METHODS . '/mbiz_payment/replaced_payment_methods');
        if (!$replacedPaymentMethods) {
            return false;
        }

        $replacedPaymentMethods = explode(',', $replacedPaymentMethods);
        foreach ($replacedPaymentMethods AS $replacedPaymentMethod) {
            $replacedPaymentMethod = trim($replacedPaymentMethod);
            // If desired code match, return the custom payment method
            if ($replacedPaymentMethod === $code) {
                $key = self::XML_PATH_PAYMENT_METHODS . '/mbiz_payment/model';
                $class = Mage::getStoreConfig($key);
                break;
            }
        }

        return Mage::getModel($class);
    }

}
