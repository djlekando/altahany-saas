<?php
session_start();
require_once __DIR__ . '/../core/app.php';

auth();

$id = $_GET['id'] ?? 0;

$stmt = db()->prepare("SELECT * FROM bookings WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if(!$data){
    die("Not found");
}

if($_POST){

    $stmt = db()->prepare("
        UPDATE bookings 
        SET name=?, email=?, phone=? 
        WHERE id=?
    ");

    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Booking</h2>

<form method="POST">

<input name="name" value="<?= $data['name'] ?>" class="form-control mb-2">
<input name="email" value="<?= $data['email'] ?>" class="form-control mb-2">
<input name="phone" value="<?= $data['phone'] ?>" class="form-control mb-2">

<button class="btn btn-primary">Update</button>

</form>
