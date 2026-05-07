<?php
require_once '../../config.php';

$data = $pdo->query("SELECT * FROM crm_customers ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/app.css">
</head>

<body>

<div class="main">

<h2>CRM Customers</h2>

<?php foreach($data as $c): ?>
<div class="cardx">
👤 <?= $c['name'] ?><br>
📱 <?= $c['phone'] ?>
</div>
<?php endforeach; ?>

</div>

</body>
</html>
