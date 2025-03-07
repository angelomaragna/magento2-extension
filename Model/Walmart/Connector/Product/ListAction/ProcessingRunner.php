<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Model\Walmart\Connector\Product\ListAction;

class ProcessingRunner extends \Ess\M2ePro\Model\Walmart\Connector\Product\ProcessingRunner
{
    // ########################################

    protected function eventBefore()
    {
        $params = $this->getParams();

        $accountId = (int)$params['account_id'];
        $sku       = (string)$params['request_data']['sku'];

        $processingActionListSku = $this->activeRecordFactory->getObject('Walmart\Processing\Action\ListAction\Sku');
        $processingActionListSku->setData(array(
            'account_id' => $accountId,
            'sku'        => $sku,
        ));
        $processingActionListSku->save();

        parent::eventBefore();
    }

    protected function eventAfter()
    {
        $params = $this->getParams();

        $accountId = (int)$params['account_id'];
        $sku       = (string)$params['request_data']['sku'];

        $processingActionListSkuCollection = $this->activeRecordFactory
                                                  ->getObject('Walmart\Processing\Action\ListAction\Sku')
                                                  ->getCollection();
        $processingActionListSkuCollection->addFieldToFilter('account_id', $accountId);
        $processingActionListSkuCollection->addFieldToFilter('sku', $sku);

        /** @var \Ess\M2ePro\Model\Walmart\Processing\Action\ListAction\Sku $processingActionListSku */
        $processingActionListSku = $processingActionListSkuCollection->getFirstItem();

        if ($processingActionListSku->getId()) {
            $processingActionListSku->delete();
        }

        parent::eventAfter();
    }

    // ########################################
}