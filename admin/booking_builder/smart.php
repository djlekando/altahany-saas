<?php
require_once '../../config.php';
require_once '../ai/assistant.php';

$input = $_POST['input'];

$ai = suggestPackage($input);

echo json_encode($ai);
?>
