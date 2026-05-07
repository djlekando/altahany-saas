<?php
require_once __DIR__ . '/../core/engine.php';
auth();

$amount = (float)$_POST['amount'];
$vat = $amount * 0.05;
$total = $amount + $vat;

$stmt = db()->prepare("INSERT INTO invoices
(customer_name, customer_email, amount, vat, total, items)
VALUES (?,?,?,?,?,?)");

$stmt->execute([
    $_POST['customer_name'],
    $_POST['customer_email'],
    $amount,
    $vat,
    $total,
    $_POST['items']
]);

header("Location: pdf.php?id=" . db()->lastInsertId());
exit;
