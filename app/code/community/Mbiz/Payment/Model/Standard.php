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
 * Standard Model
 * @package Mbiz_Payment
 */
class Mbiz_Payment_Model_Standard extends Mage_Payment_Model_Method_Abstract
{
    protected $_code = 'mbiz_payment';
    protected $_infoBlockType = 'mbiz_payment/info_standard';
}
