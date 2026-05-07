<?php

require_once "gateways/stripe.php";
require_once "gateways/paytabs.php";

class PaymentEngine {

public function pay($method,$amount){

if($method=="stripe"){
$gw = new StripeGateway("sk_test_key");
return $gw->charge($amount);
}

if($method=="paytabs"){
$gw = new PayTabsGateway();
return $gw->charge($amount);
}

return ["status"=>"error"];
}
}
?>
