<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Block\Adminhtml\Walmart\Template\Synchronization\Edit;

use Ess\M2ePro\Block\Adminhtml\Magento\AbstractBlock;

class Data extends AbstractBlock
{
    protected $_template = 'template/2_column.phtml';

    protected function _prepareLayout()
    {
        $this->setChild('tabs', $this->createBlock('Walmart\Template\Synchronization\Edit\Tabs'));

        return parent::_prepareLayout();
    }
}