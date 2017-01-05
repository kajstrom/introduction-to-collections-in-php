<?php
require __DIR__ . "/../vendor/autoload.php";
$customers = [
    [
        "name" => "Kaj",
        "lastname" => "Ström",
        "email" => "kaj.strom@kapsi.fi",
        "active" => true
    ],
    [
        "name" => "Ville",
        "lastname" => "Viklund",
        "email" => "ville@example.com",
        "active" => false,
    ],
    [
        "name" => "Mikko",
        "lastname" => "Niemikorpi",
        "email" => "mikko@example.com",
        "active" => true
    ]
];

foreach ($customers as $customer) {
    if (false === $customer["active"]) {
        continue;
    }

    $sendArray = [
        "to" => $customer["email"],
        "toName" => $customer["name"] . " " . $customer["lastname"],
        "title" => $customer["name"] . ", osta kaikki!"
    ];

    $sender->send($sendArray);
}

$customers = collect($customers);

$customers
    ->filter(function($customer) {return $customer["active"];})
    ->map(function ($customer) {
        return [
            "to" => $customer["email"],
            "toName" => $customer["name"] . " " . $customer["lastname"],
            "title" => $customer["name"] . ", osta kaikki!"
        ];
    })
    ->each(function ($sendArr) use ($sender) {$sender->send($sendArr);});