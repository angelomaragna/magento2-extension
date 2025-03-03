<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Controller\Adminhtml\Walmart\Listing\View\Settings\Moving;

class MoveToListingGrid extends \Ess\M2ePro\Controller\Adminhtml\Walmart\Listing
{
    //########################################

    public function execute()
    {
        $this->getHelper('Data\GlobalData')->setValue(
            'componentMode', $this->getRequest()->getParam('componentMode')
        );
        $this->getHelper('Data\GlobalData')->setValue(
            'accountId', $this->getRequest()->getParam('accountId')
        );
        $this->getHelper('Data\GlobalData')->setValue(
            'marketplaceId', $this->getRequest()->getParam('marketplaceId')
        );
        $this->getHelper('Data\GlobalData')->setValue(
            'ignoreListings', $this->getHelper('Data')->jsonDecode($this->getRequest()->getParam('ignoreListings'))
        );

        $block = $this->createBlock(
            'Listing\Moving\Grid','',
            ['data' => [
                'grid_url' => $this->getUrl(
                    '*/walmart_listing_view_settings_moving/moveToListingGrid',array('_current'=>true)
                ),
                'moving_handler_js' => 'ListingGridHandlerObj.movingHandler',
            ]]
        );

        $this->setAjaxContent($block);
        return $this->getResult();
    }

    //########################################
}