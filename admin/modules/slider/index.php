<?php
require_once '../../../config.php';
require_once '../../core/features.php';

if(!feature($pdo,'slider')){
die("Slider Disabled");
}

$data = $pdo->query("SELECT * FROM slider ORDER BY id DESC")->fetchAll();
?>

<h2>Slider Manager</h2>

<?php foreach($data as $s): ?>
<div style="background:#222;padding:10px;margin:10px">
<img src="<?= $s['image'] ?>" width="200">
<h4><?= $s['title'] ?></h4>
</div>
<?php endforeach; ?>
