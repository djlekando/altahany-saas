<?php
require_once "payment_engine.php";

$engine = new PaymentEngine();

$result = $engine->pay($_POST['method'],$_POST['amount']);

echo json_encode($result);
?>
