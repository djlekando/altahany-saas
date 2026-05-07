<?php
require_once __DIR__ . '/engine.php';
require_once __DIR__ . '/whatsapp.php';

function createInvoice($data){

    $vat = $data['amount'] * 0.05;
    $total = $data['amount'] + $vat;

    $stmt = db()->prepare("INSERT INTO invoices
    (customer_name, customer_email, customer_phone, amount, vat, total, items)
    VALUES (?,?,?,?,?,?,?)");

    $stmt->execute([
        $data['customer_name'],
        $data['customer_email'],
        $data['customer_phone'],
        $data['amount'],
        $vat,
        $total,
        $data['items']
    ]);

    $invoice_id = db()->lastInsertId();

    // WhatsApp Message
    $message =
    "🧾 ALTATAHANY INVOICE\n"
    ."Name: ".$data['customer_name']."\n"
    ."Total: ".$total." AED\n"
    ."VAT: ".$vat." AED\n"
    ."Invoice ID: #".$invoice_id;

    if(!empty($data['customer_phone'])){
        sendWhatsApp($data['customer_phone'], $message);
    }

    return $invoice_id;
}
