<?php
session_start();
if(!isset($_SESSION['admin'])) die("No access");

$file = file_get_contents("../../logs/deploy.log");
echo "<pre style='background:#111;color:#0f0;padding:20px'>$file</pre>";
