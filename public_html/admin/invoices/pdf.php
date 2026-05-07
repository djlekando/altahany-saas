<?php
require_once __DIR__ . '/../core/engine.php';
auth();

$id = $_GET['id'];
$inv = db()->query("SELECT * FROM invoices WHERE id=$id")->fetch();

$settings = [
    "name" => "ALTATAHANY WEDDING SERVICES",
    "logo" => "https://www.altahany.com/assets/images/logo.png"
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice #<?= $id ?></title>

<style>
body{
    font-family: Arial;
    background:#fff;
    color:#000;
    padding:40px;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:2px solid #d4af37;
    padding-bottom:20px;
}

.logo{
    height:70px;
}

h1{
    color:#d4af37;
}

.box{
    margin-top:20px;
}

.table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

.table th,.table td{
    border:1px solid #ddd;
    padding:10px;
}

.total{
    font-size:22px;
    font-weight:bold;
    color:#d4af37;
    margin-top:20px;
}

.footer{
    margin-top:40px;
    font-size:12px;
    color:#666;
    text-align:center;
}
</style>

</head>

<body>

<div class="header">
    <div>
        <h1><?= $settings['name'] ?></h1>
        <p>Professional Wedding Services - UAE</p>
    </div>

    <img class="logo" src="<?= $settings['logo'] ?>">
</div>

<div class="box">
    <h2>Invoice #<?= $id ?></h2>

    <p><b>Customer:</b> <?= $inv['customer_name'] ?></p>
    <p><b>Email:</b> <?= $inv['customer_email'] ?></p>
    <p><b>Phone:</b> <?= $inv['customer_phone'] ?></p>
</div>

<table class="table">
<tr>
    <th>Description</th>
</tr>
<tr>
    <td><?= nl2br($inv['items']) ?></td>
</tr>
</table>

<div class="box">
    <p>Subtotal: <?= $inv['amount'] ?> AED</p>
    <p>VAT (5% UAE): <?= $inv['vat'] ?> AED</p>

    <div class="total">
        TOTAL: <?= $inv['total'] ?> AED
    </div>
</div>

<div class="footer">
    Powered by ALTATAHANY SaaS • www.altahany.com • All Rights Reserved
</div>

<script>
window.onload = function(){
    window.print();
}
</script>

</body>
</html>
