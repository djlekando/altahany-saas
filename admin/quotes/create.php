<?php
require_once '../../config.php';

$data = $_POST['data'] ?? [];
$lang = $_POST['lang'] ?? 'ar';

$total = 0;
foreach($data as $item){
$total += $item['price'];
}

$stmt = $pdo->prepare("INSERT INTO quotes(client_name,language,data,total) VALUES (?,?,?,?)");
$stmt->execute([
$_POST['client'],
$lang,
json_encode($data),
$total
]);

echo "OK";
?>
