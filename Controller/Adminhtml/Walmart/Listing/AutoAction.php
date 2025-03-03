<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Controller\Adminhtml\Walmart\Listing;

abstract class AutoAction extends \Ess\M2ePro\Controller\Adminhtml\Walmart\Listing
{
    //########################################

    protected function getCategoryTemplate($autoMode, $groupId, $listing)
    {
        $template = NULL;

        switch ($autoMode) {
            case \Ess\M2ePro\Model\Listing::AUTO_MODE_GLOBAL:
                $template = $listing->getChildObject()->getAutoGlobalAddingCategoryTemplate();
                break;
            case \Ess\M2ePro\Model\Listing::AUTO_MODE_WEBSITE:
                $template = $listing->getChildObject()->getAutoWebsiteAddingCategoryTemplate();
                break;
            case \Ess\M2ePro\Model\Listing::AUTO_MODE_CATEGORY:
                if ($magentoCategoryId = $this->getRequest()->getParam('magento_category_id')) {
                    $autoCategory = $this->activeRecordFactory->getObject('Listing\Auto\Category')
                        ->getCollection()
                        ->addFieldToFilter('group_id', $groupId)
                        ->addFieldToFilter('category_id', $magentoCategoryId)
                        ->getFirstItem();

                    if ($autoCategory->getId()) {
                        $template = $this->activeRecordFactory->getObjectLoaded(
                            'Walmart\Listing\Auto\Category\Group', $groupId
                        )->getCategoryTemplate();
                    }
                }
                break;
        }

        return $template;
    }

    protected function getOtherCategoryTemplate($autoMode, $groupId, $listing)
    {
        $template = NULL;

        switch ($autoMode) {
            case \Ess\M2ePro\Model\Listing::AUTO_MODE_GLOBAL:
                $template = $listing->getChildObject()->getAutoGlobalAddingOtherCategoryTemplate();
                break;
            case \Ess\M2ePro\Model\Listing::AUTO_MODE_WEBSITE:
                $template = $listing->getChildObject()->getAutoWebsiteAddingOtherCategoryTemplate();
                break;
            case \Ess\M2ePro\Model\Listing::AUTO_MODE_CATEGORY:
                if ($magentoCategoryId = $this->getRequest()->getParam('magento_category_id')) {
                    $autoCategory = $this->activeRecordFactory->getObject('Listing\Auto\Category')
                        ->getCollection()
                        ->addFieldToFilter('group_id', $groupId)
                        ->addFieldToFilter('category_id', $magentoCategoryId)
                        ->getFirstItem();

                    if ($autoCategory->getId()) {
                        $template = $this->activeRecordFactory->getObjectLoaded(
                            'Walmart\Listing\Auto\Category\Group', $groupId
                        )->getOtherCategoryTemplate();
                    }
                }
                break;
        }

        return $template;
    }

    //########################################
}