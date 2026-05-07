<?php

// SAFE SINGLE SESSION START
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config.php';

/* AUTH */
function auth(){
    if(!isset($_SESSION['admin'])){
        header("Location: /admin/login.php");
        exit;
    }
}

/* DB */
function db(){
    global $pdo;
    return $pdo;
}

function countTable($table){
    global $pdo;
    try{
        return $pdo->query("SELECT COUNT(*) c FROM $table")->fetch()['c'] ?? 0;
    }catch(Exception $e){
        return 0;
    }
}
