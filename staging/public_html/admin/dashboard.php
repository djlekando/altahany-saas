<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>ALTATAHANY CONTROL CENTER</title>
<style>
body{background:#0b0b0b;color:#fff;font-family:system-ui}
a{display:block;color:#fff;margin:10px}
.box{background:#151515;padding:10px;margin:10px}
</style>
</head>

<body>

<h2>CONTROL PANEL</h2>

<div class="box">
<a href="?p=bookings">Bookings</a>
<a href="?p=media">Media</a>
<a href="?p=invoices">Invoices</a>
<a href="?p=quotes">Quotes</a>
<a href="?p=crm">CRM</a>
<a href="logout.php">Logout</a>
</div>

<?php
$page=$_GET['p'] ?? '';

if($page=="bookings") echo "<div class='box'>BOOKINGS MODULE</div>";
if($page=="media") echo "<div class='box'>MEDIA MODULE</div>";
if($page=="invoices") echo "<div class='box'>INVOICES MODULE</div>";
if($page=="quotes") echo "<div class='box'>QUOTES MODULE</div>";
if($page=="crm") echo "<div class='box'>CRM MODULE</div>";
?>

</body>
</html>
