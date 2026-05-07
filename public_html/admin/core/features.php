<?php

require_once __DIR__ . '/engine.php';

/* GET FEATURE STATUS */
function feature($name){
    global $pdo;

    $stmt = $pdo->prepare("SELECT status FROM features WHERE name=?");
    $stmt->execute([$name]);
    $row = $stmt->fetch();

    return $row ? (int)$row['status'] : 0;
}

/* TOGGLE FEATURE */
function toggleFeature($name){
    global $pdo;

    $stmt = $pdo->prepare("UPDATE features SET status = 1 - status WHERE name=?");
    return $stmt->execute([$name]);
}
