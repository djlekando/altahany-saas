<?php
require_once __DIR__ . '/../core/engine.php';
auth();

if($_POST){

    $stmt = db()->prepare("INSERT INTO whatsapp_settings
    (phone_number_id, token, enabled)
    VALUES (?,?,1)
    ON DUPLICATE KEY UPDATE
    phone_number_id=VALUES(phone_number_id),
    token=VALUES(token)");

    $stmt->execute([
        $_POST['phone_number_id'],
        $_POST['token']
    ]);

    echo "Saved";
}
?>

<form method="POST">
<input name="phone_number_id" placeholder="Phone Number ID" class="form-control my-2">
<input name="token" placeholder="API Token" class="form-control my-2">
<button class="btn btn-success">Save</button>
</form>
