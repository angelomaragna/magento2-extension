<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Controller\Adminhtml\Walmart\Order;

use Ess\M2ePro\Controller\Adminhtml\Walmart\Order;

class OrderItemGrid extends Order
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $order = $this->walmartFactory->getObjectLoaded('Order', (int)$id);

        if (!$id || !$order->getId()) {
            return $this->_redirect($this->_redirect->getRefererUrl());
        }

        $this->getHelper('Data\GlobalData')->setValue('order', $order);

        $this->setAjaxContent($this->createBlock('Walmart\Order\View\Item'));

        return $this->getResult();
    }
}