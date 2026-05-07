<?php

class PayTabsGateway {

public function charge($amount){

return [
"status"=>"success",
"gateway"=>"paytabs",
"amount"=>$amount,
"transaction_id"=>uniqid("pt_")
];
}
}
?>
