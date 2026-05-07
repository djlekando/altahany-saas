<?php
require_once '../../config.php';

$data = $_POST;

// تحويل إلى عميل CRM
$stmt = $pdo->prepare("INSERT INTO crm_customers(name,phone) VALUES (?,?)");
$stmt->execute([$data['name'],$data['phone']]);

// إنشاء رسالة واتساب
$query = http_build_query($data);
header("Location: /admin/whatsapp/send.php?".$query);
exit;
?>
