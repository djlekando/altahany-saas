<?php
session_start();

$error="";

if($_SERVER['REQUEST_METHOD']==='POST'){

$user=$_POST['user'];
$pass=$_POST['pass'];

if($user==="lekando" && $pass==="Altahany@20004"){
$_SESSION['admin']=true;
header("Location: index.php");
exit;
}

$error="Invalid login";
}
?>

<form method="POST">
<h2>ALTATAHANY ADMIN</h2>

<?php if($error) echo $error; ?>

<input name="user" placeholder="user">
<input name="pass" type="password" placeholder="pass">
<button>Login</button>
</form>
