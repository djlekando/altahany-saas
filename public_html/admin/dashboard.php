<?php
require_once __DIR__ . '/core/analytics.php';
auth();

$data = analytics();

$labels = [];
$values = [];

foreach($data['daily'] as $d){
    $labels[] = $d['d'];
    $values[] = $d['c'];
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Analytics Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{background:#0a0a0a;color:#fff;font-family:system-ui}
.sidebar{width:240px;position:fixed;right:0;height:100vh;background:#111;padding:15px}
.main{margin-right:240px;padding:20px}
.cardx{background:#151515;padding:20px;border-radius:12px;margin:10px}
.gold{color:#d4af37}
a{color:#fff;text-decoration:none;display:block;padding:8px}
a:hover{background:#d4af37;color:#000}
</style>

</head>

<body>

<div class="sidebar">
<h3 class="gold">ALTATAHANY</h3>

<a href="dashboard.php">Analytics</a>
<a href="bookings/index.php">Bookings</a>
<a href="invoices/index.php">Invoices</a>
<a href="whatsapp/index.php">WhatsApp CRM</a>
<a href="features/index.php">Features</a>
<a href="logout.php">Logout</a>
</div>

<div class="main">

<h2 class="gold">📊 Analytics Dashboard</h2>

<div class="row">

<div class="col-md-4 cardx">
<h4>Bookings</h4>
<h2><?= $data['bookings'] ?></h2>
</div>

<div class="col-md-4 cardx">
<h4>Invoices</h4>
<h2><?= $data['invoices'] ?></h2>
</div>

<div class="col-md-4 cardx">
<h4>Revenue (AED)</h4>
<h2><?= $data['revenue'] ?></h2>
</div>

</div>

<div class="cardx mt-4">
<h4>Bookings Growth (Last 7 Days)</h4>
<canvas id="chart"></canvas>
</div>

</div>

<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Bookings',
            data: <?= json_encode($values) ?>,
            borderColor: '#d4af37',
            tension: 0.3
        }]
    }
});
</script>

</body>
</html>
