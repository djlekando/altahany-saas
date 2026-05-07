<?php
require_once __DIR__ . '/../core/engine.php';
require_once __DIR__ . '/../core/ai_booking.php';
auth();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>AI Booking Assistant</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#0b0b0b;color:#fff;font-family:system-ui}
.box{background:#151515;padding:20px;border-radius:12px;margin-top:20px}
.gold{color:#d4af37}
.suggest{background:#1f1f1f;padding:10px;border-radius:10px;margin-top:10px}
</style>
</head>

<body>

<div class="container py-4">

<h2 class="gold">🤖 AI Booking Assistant</h2>

<div class="box">

<form method="POST">

<select name="budget" class="form-control my-2" id="budget">
<option value="">اختر الميزانية</option>
<option value="low">Low</option>
<option value="medium">Medium</option>
<option value="high">High</option>
<option value="luxury">Luxury</option>
</select>

<button class="btn btn-warning w-100">Analyze</button>

</form>

<?php
if($_POST){
    $ai = suggestPackage($_POST['budget']);
?>

<div class="suggest">
<h4>🧠 AI Suggestion</h4>

<p><b>Package:</b> <?= $ai['package'] ?></p>

<p><b>Services:</b></p>
<ul>
<?php foreach($ai['services'] as $s): ?>
<li><?= $s ?></li>
<?php endforeach; ?>
</ul>

<p><?= $ai['message'] ?></p>

</div>

<?php } ?>

</div>

</div>

</body>
</html>
