<?php
require_once __DIR__ . '/../../config.php';

function db(){
    global $pdo;
    return $pdo;
}
