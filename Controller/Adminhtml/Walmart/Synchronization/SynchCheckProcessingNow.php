<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Controller\Adminhtml\Walmart\Synchronization;

use Ess\M2ePro\Controller\Adminhtml\Walmart\Settings;

class SynchCheckProcessingNow extends Settings
{
    //########################################

    public function execute()
    {
        $warningMessages = array();

        $Processing = $this->activeRecordFactory->getObject('Lock\Item')->getCollection()
            ->addFieldToFilter('nick', array('like' => 'synchronization_walmart%'))
            ->getSize();

        if ($Processing > 0) {
            $warningMessages[] = $this->__(
                'Data has been sent on Walmart. It is being processed now. You can continue working with M2E Pro.'
            );
        }

        $this->setJsonContent(array(
            'messages' => $warningMessages
        ));

        return $this->getResponse();
    }

    //########################################
}