<?php

function suggestPackage($budget){

    $budget = strtolower($budget);

    if($budget == 'low'){
        return [
            "package" => "Basic Wedding Package",
            "services" => ["Photography", "Basic Decoration"],
            "message" => "اقتصادية مناسبة للبدايات"
        ];
    }

    if($budget == 'medium'){
        return [
            "package" => "Standard Wedding Package",
            "services" => ["Photography", "Decoration", "DJ"],
            "message" => "أفضل توازن بين السعر والجودة"
        ];
    }

    if($budget == 'high'){
        return [
            "package" => "Premium Wedding Package",
            "services" => ["Photography", "Luxury Decoration", "Catering", "DJ"],
            "message" => "تجربة فاخرة متكاملة"
        ];
    }

    if($budget == 'luxury'){
        return [
            "package" => "Royal Wedding Package",
            "services" => ["Full Production", "Luxury Catering", "VIP Decoration", "Drone Photography"],
            "message" => "تجربة ملكية كاملة"
        ];
    }

    return [
        "package" => "Custom Package",
        "services" => [],
        "message" => "حسب الطلب"
    ];
}
