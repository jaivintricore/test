<?php
require 'app/Mage.php';
Mage::app('admin')->setUseSessionInUrl(false);

$orderIncrementId = 100000250;
$order = Mage::getModel('sales/order')
                ->loadByIncrementId($orderIncrementId);

try{
        $order->delete();
        echo "order #".$orderIncrementId." is removed".PHP_EOL;
    }catch(Exception $e){
        echo "order #".$orderIncrementId." could not be remvoved: ".$e->getMessage().PHP_EOL;
    }

?>