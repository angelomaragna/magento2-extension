<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Block\Adminhtml\Wizard\InstallationWalmart\Installation;

use Ess\M2ePro\Block\Adminhtml\Wizard\InstallationWalmart\Installation;

class ListingTutorial extends Installation
{
    //########################################

    protected function _construct()
    {
        parent::_construct();

        $this->updateButton('continue', 'label', $this->__('Create First Listing'));
        $this->updateButton('continue', 'class', 'primary');
    }

    protected function getStep()
    {
        return 'listingTutorial';
    }

    //########################################
}