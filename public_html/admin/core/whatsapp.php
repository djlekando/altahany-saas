<?php

function waSettings(){
    global $pdo;
    return $pdo->query("SELECT * FROM whatsapp_settings LIMIT 1")->fetch();
}

function whatsappEnabled(){
    $s = waSettings();
    return $s && $s['enabled'] == 1;
}

function sendWhatsApp($to, $message){

    if(!whatsappEnabled()) return false;

    $s = waSettings();

    $url = "https://graph.facebook.com/v19.0/".$s['phone_number_id']."/messages";

    $data = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "text",
        "text" => ["body" => $message]
    ];

    $headers = [
        "Authorization: Bearer ".$s['token'],
        "Content-Type: application/json"
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
