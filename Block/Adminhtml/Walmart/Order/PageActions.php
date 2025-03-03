<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Block\Adminhtml\Walmart\Order;

use Ess\M2ePro\Block\Adminhtml\Magento\AbstractBlock;

class PageActions extends AbstractBlock
{
    protected function _toHtml()
    {
        // ---------------------------------------
        $marketplaceSwitcherBlock = $this->createBlock('Walmart\Marketplace\Switcher')->setData([
            'component_mode' => \Ess\M2ePro\Helper\Component\Walmart::NICK,
            'controller_name' => 'walmart_order'
        ]);

        $accountSwitcherBlock = $this->createBlock('Walmart\Account\Switcher')->setData([
            'component_mode' => \Ess\M2ePro\Helper\Component\Walmart::NICK,
            'controller_name' => 'walmart_order'
        ]);

        $orderStateSwitcherBlock = $this->createBlock('Order\NotCreatedFilter')->setData([
            'component_mode' => \Ess\M2ePro\Helper\Component\Walmart::NICK,
            'controller' => 'walmart_order'
        ]);
        // ---------------------------------------

        return
            '<div class="filter_block">'
            . $accountSwitcherBlock->toHtml()
            . $marketplaceSwitcherBlock->toHtml()
            . $orderStateSwitcherBlock->toHtml()
            . '</div>'
            . parent::_toHtml();
    }
}