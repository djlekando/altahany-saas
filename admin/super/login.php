<?php
session_start();

if($_POST){

if($_POST['user']=="superadmin" && $_POST['pass']=="MASTER@2026"){
$_SESSION['super_admin']=true;
header("Location: index.php");
exit;
}
}
?>

<form method="POST">
<input name="user" placeholder="User">
<input name="pass" type="password" placeholder="Pass">
<button>Login</button>
</form>
