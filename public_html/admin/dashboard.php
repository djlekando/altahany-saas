<?php
session_start();
require_once __DIR__ . '/core/app.php';

auth();

/* LIVE DATA */
$bookings = countTable("bookings");
$media    = countTable("media");
$invoices = countTable("invoices");
$quotes   = countTable("quotations");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>ALTATAHANY SaaS Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#0b0b0b;color:#fff;font-family:system-ui}
.sidebar{width:220px;position:fixed;right:0;height:100vh;background:#111;padding:15px}
.main{margin-right:220px;padding:20px}
.cardx{background:#151515;padding:15px;border-radius:10px;margin:10px}
.gold{color:#d4af37}
a{color:#fff;text-decoration:none;display:block;padding:8px}
a:hover{background:#d4af37;color:#000}
</style>

</head>

<body>

<div class="sidebar">
<h3 class="gold">ALTATAHANY</h3>
<a href="dashboard.php">Dashboard</a>
<a href="bookings/index.php">Bookings</a>
<a href="media/index.php">Media</a>
<a href="invoices/index.php">Invoices</a>
<a href="quotes/index.php">Quotes</a>
<a href="logout.php">Logout</a>
</div>

<div class="main">

<h2 class="gold">Live Dashboard</h2>

<div class="cardx">Bookings: <?= $bookings ?></div>
<div class="cardx">Media: <?= $media ?></div>
<div class="cardx">Invoices: <?= $invoices ?></div>
<div class="cardx">Quotes: <?= $quotes ?></div>

</div>

</body>
</html>
