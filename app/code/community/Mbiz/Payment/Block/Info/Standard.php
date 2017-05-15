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
 * Info Standard Block
 * @package Mbiz_Payment
 */
class Mbiz_Payment_Block_Info_Standard extends Mage_Payment_Block_Info
{

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('payment/info/mbiz_standard.phtml');
    }

    /**
     * Render as PDF
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('payment/info/pdf/mbiz_standard.phtml');
        return $this->toHtml();
    }

}
