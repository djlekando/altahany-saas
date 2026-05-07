<?php

/* =========================
   ALTATAHANY CORE ENGINE
========================= */

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

/* COUNT */
function countTable($table){
    global $pdo;
    try{
        return $pdo->query("SELECT COUNT(*) c FROM $table")->fetch()['c'] ?? 0;
    }catch(Exception $e){
        return 0;
    }
}

/* SAFE QUERY */
function all($table){
    global $pdo;
    try{
        return $pdo->query("SELECT * FROM $table ORDER BY id DESC")->fetchAll();
    }catch(Exception $e){
        return [];
    }
}

/* INSERT */
function insert($table,$data){
    global $pdo;

    $keys = implode(",", array_keys($data));
    $vals = ":" . implode(",:", array_keys($data));

    $sql = "INSERT INTO $table ($keys) VALUES ($vals)";
    $stmt = $pdo->prepare($sql);

    return $stmt->execute($data);
}
