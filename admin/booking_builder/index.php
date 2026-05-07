<?php
require_once '../../config.php';

$options = $pdo->query("SELECT * FROM booking_options")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/app.css">
</head>

<body>

<div class="main">

<h2>Booking Builder</h2>

<div class="cardx">

<label>Stage</label>
<select>
<?php foreach($options as $o): if($o['type']=='stage'): ?>
<option><?= $o['name'] ?></option>
<?php endif; endforeach; ?>
</select>

</div>

<div class="cardx">

<label>Decoration</label>
<select>
<?php foreach($options as $o): if($o['type']=='decoration'): ?>
<option><?= $o['name'] ?></option>
<?php endif; endforeach; ?>
</select>

</div>

<div class="cardx">

<label>DJ</label>
<select>
<?php foreach($options as $o): if($o['type']=='dj'): ?>
<option><?= $o['name'] ?></option>
<?php endif; endforeach; ?>
</select>

</div>

<button class="btn-gold">Generate Quote</button>

</div>

</body>
</html>
