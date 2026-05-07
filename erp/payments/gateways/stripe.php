<?php

class StripeGateway {

private $secret;

public function __construct($secret){
$this->secret = $secret;
}

public function charge($amount,$currency="aed"){

// Placeholder API call (replace with real Stripe SDK later)

return [
"status"=>"success",
"gateway"=>"stripe",
"amount"=>$amount,
"currency"=>$currency,
"transaction_id"=>uniqid("stripe_")
];
}
}
?>
