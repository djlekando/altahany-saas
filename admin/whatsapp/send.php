<?php
require_once '../config.php';
require_once 'builder.php';

$data = $_POST;

$message = buildWhatsAppMessage($data);

$phone = "971527249190"; // default business number

$url = "https://wa.me/".$phone."?text=".$message;

// حفظ العميل في CRM
$stmt = $pdo->prepare("INSERT INTO crm_customers(name,phone) VALUES (?,?)");
$stmt->execute([$data['name'],$data['phone']]);

header("Location: ".$url);
exit;
?>
