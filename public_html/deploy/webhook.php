<?php

// SIMPLE SECURITY TOKEN
$secret = "ALTATAHANY_DEPLOY_2026";

if(!isset($_GET['token']) || $_GET['token'] !== $secret){
    http_response_code(403);
    exit("Forbidden");
}

// PATH TO PROJECT
$path = realpath(__DIR__ . '/../');

// EXECUTE GIT PULL
$output = shell_exec("cd $path && git pull origin main 2>&1");

// LOG RESULT
file_put_contents(__DIR__ . "/deploy.log", date("Y-m-d H:i:s")."\n".$output."\n\n", FILE_APPEND);

echo "<pre>$output</pre>";
