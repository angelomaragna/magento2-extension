<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Controller\Adminhtml\Walmart\Listing\Product\Variation\Vocabulary;

use Ess\M2ePro\Controller\Adminhtml\Walmart\Main;

class RemoveAttribute extends Main
{
    public function execute()
    {
        $magentoAttr = $this->getRequest()->getParam('magento_attr');
        $channelAttr = $this->getRequest()->getParam('channel_attr');

        if (empty($magentoAttr) || empty($channelAttr)) {
            $this->setAjaxContent('You should provide correct parameters.', false);
            return $this->getResult();
        }

        $vocabularyHelper = $this->getHelper('Component\Walmart\Vocabulary');
        $vocabularyHelper->removeAttributeFromLocalStorage($magentoAttr, $channelAttr);

        $this->setJsonContent([
            'success' => true
        ]);

        return $this->getResult();
    }
}