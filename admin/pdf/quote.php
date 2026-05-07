<?php
require_once '../../config.php';

$id = $_GET['id'];

$q = $pdo->query("SELECT * FROM quotes WHERE id=$id")->fetch();

$data = json_decode($q['data'],true);

$html = "<h1>ALTATAHANY QUOTE</h1>";
$html .= "<p>Client: ".$q['client_name']."</p>";

$html .= "<table border='1' cellpadding='5'>";

foreach($data as $d){
$html .= "<tr><td>".$d['name']."</td><td>".$d['price']."</td></tr>";
}

$html .= "</table>";
$html .= "<h3>Total: ".$q['total']."</h3>";

echo $html;
?>
