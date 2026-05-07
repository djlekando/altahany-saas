<?php
require_once __DIR__ . '/engine.php';

function analytics(){

    global $pdo;

    $bookings = $pdo->query("SELECT COUNT(*) c FROM bookings")->fetch()['c'] ?? 0;
    $invoices = $pdo->query("SELECT COUNT(*) c FROM invoices")->fetch()['c'] ?? 0;

    $revenue = $pdo->query("SELECT SUM(total) c FROM invoices")->fetch()['c'] ?? 0;

    // last 7 days bookings
    $daily = $pdo->query("
        SELECT DATE(created_at) d, COUNT(*) c
        FROM bookings
        GROUP BY DATE(created_at)
        ORDER BY d DESC
        LIMIT 7
    ")->fetchAll();

    return [
        "bookings" => $bookings,
        "invoices" => $invoices,
        "revenue" => $revenue,
        "daily" => $daily
    ];
}
