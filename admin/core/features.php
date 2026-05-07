<?php
require_once '../../config.php';

function feature($pdo,$key){

$stmt = $pdo->prepare("SELECT is_active FROM feature_flags WHERE feature_key=?");
$stmt->execute([$key]);
$row = $stmt->fetch();

return $row ? (bool)$row['is_active'] : false;
}
?>
