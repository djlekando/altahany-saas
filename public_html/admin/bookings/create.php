<?php
session_start();
require_once __DIR__ . '/../core/app.php';

auth();

if($_POST){

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $stmt = db()->prepare("
        INSERT INTO bookings (name,email,phone,created_at)
        VALUES (?,?,?,NOW())
    ");

    $stmt->execute([$name,$email,$phone]);

    header("Location: index.php");
    exit;
}
?>

<h2>Add Booking</h2>

<form method="POST">

<input name="name" placeholder="Name" class="form-control mb-2">
<input name="email" placeholder="Email" class="form-control mb-2">
<input name="phone" placeholder="Phone" class="form-control mb-2">

<button class="btn btn-success">Save</button>

</form>
