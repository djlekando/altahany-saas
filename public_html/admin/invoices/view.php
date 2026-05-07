<?php
require_once __DIR__ . '/../core/engine.php';
auth();

$id = $_GET['id'];

$inv = db()->query("SELECT * FROM invoices WHERE id=$id")->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice</title>
</head>

<body style="font-family:Arial;background:#111;color:#fff;padding:20px">

<h1>ALTATAHANY INVOICE</h1>

<p>Customer: <?= $inv['customer_name'] ?></p>
<p>Email: <?= $inv['customer_email'] ?></p>
<p>Phone: <?= $inv['customer_phone'] ?></p>

<hr>

<p>Items: <?= $inv['items'] ?></p>

<h3>Amount: <?= $inv['amount'] ?></h3>
<h3>VAT: <?= $inv['vat'] ?></h3>
<h2>Total: <?= $inv['total'] ?></h2>

<div style="text-align:center;margin-top:30px"><a href="pdf.php?id=$id" style="padding:10px 20px;background:#d4af37;color:#000;text-decoration:none">Download PDF</a></div></body>
</html>
