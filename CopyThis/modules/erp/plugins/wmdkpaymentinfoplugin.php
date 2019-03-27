<?php
class WmdkPaymentInfoPlugin extends oxErpPluginBase
{
    private $_aData = array();
    
	public function invoke($aParams)
	{
		$oResult = new oxERPReturn();
		$oResult->blResult = TRUE;
        
        $sOxid = isset($aParams['sOrderId']) ? $aParams['sOrderId'] : FALSE;
        
        if ($sOxid != FALSE) {
            
            try {            
                // LOAD ORDER
                $oOrder = oxNew('oxorder');
                $oOrder->load($sOxid);

                // LOAD PAYMENT
                $oUserPayments = oxNew('oxuserpayment');
                $oUserPayments->load($oOrder->oxorder__oxpaymentid->value);
                
                if($oUserPayments) {
                    $this->_aData['OXPAYMENTSID'] = $oUserPayments->oxuserpayments__oxpaymentsid->value;
                    $this->_getPaymentInfos($oUserPayments->oxuserpayments__oxvalue->value);
                    $this->_aData['OXTIMESTAMP'] = $oUserPayments->oxuserpayments__oxtimestamp->value;
                    
                    foreach($this->_aData as $sKey => $sValue) {
                        $oResult->aResult[$sKey] = $sValue;
                    }
                }

            } catch (Exception $oException) {
                // ERROR
                $oResult->blResult = FALSE;
                $oResult->sMessage = json_decode(array(
                    'system_errors' => array($oException->getMessage()),
                ));
            }
            
        } else {
            // ERROR
            $oResult->blResult = FALSE;
            $oResult->sMessage = json_decode(array(
                'validation_errors' => array('ERROR_NO_ORDER_ID_GIVEN'),
            ));
        }

		return array($oResult);
	}
    
    private function _getPaymentInfos($sPaymentInfo) {
        $aPaymentInfos = explode('@@', $sPaymentInfo);
        
        foreach($aPaymentInfos as $aPaymentInfo) {
            $aData = explode('__', $aPaymentInfo);
            
            $this->_aData[$aData[0]] = $aData[1];
        }
    }
}