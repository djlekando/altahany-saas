<?php
session_start();
require_once '../../config.php';

if(!isset($_SESSION['super_admin'])){
die("Access Denied");
}

$tenants = $pdo->query("SELECT * FROM tenants ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#0b0b0b;color:#fff}
.box{background:#151515;padding:15px;margin:10px;border-radius:10px}
</style>
</head>

<body>

<div class="container py-4">

<h2>SUPER ADMIN PANEL</h2>

<?php foreach($tenants as $t): ?>
<div class="box">
<h4><?= $t['name'] ?></h4>
<p><?= $t['email'] ?></p>
<p>Plan: <?= $t['plan'] ?></p>
</div>
<?php endforeach; ?>

</div>

</body>
</html>
