<?php
session_start();
require_once __DIR__ . '/../core/app.php';

auth();

$bookings = fetchAll("bookings");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Bookings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#0b0b0b;color:#fff;font-family:system-ui}
.cardx{background:#151515;padding:15px;border-radius:10px;margin:10px 0}
.gold{color:#d4af37}
a{color:#d4af37;text-decoration:none}
</style>
</head>

<body>

<div class="container py-4">

<h2 class="gold">Bookings System</h2>

<a class="btn btn-warning mb-3" href="create.php">+ New Booking</a>

<?php if(!$bookings): ?>
<div class="cardx">No bookings yet</div>
<?php endif; ?>

<?php foreach($bookings as $b): ?>
<div class="cardx">

<h5><?= htmlspecialchars($b['name'] ?? '') ?></h5>
<p><?= htmlspecialchars($b['email'] ?? '') ?></p>
<p><?= htmlspecialchars($b['phone'] ?? '') ?></p>

<a href="edit.php?id=<?= $b['id'] ?>">Edit</a> |
<a href="delete.php?id=<?= $b['id'] ?>" onclick="return confirm('Delete?')">Delete</a>

</div>
<?php endforeach; ?>

</div>

</body>
</html>
