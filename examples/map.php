<?php
require __DIR__ . "/../vendor/autoload.php";
$customers = [
    [
        "name" => "Kaj",
        "email" => "kaj.strom@kapsi.fi"
    ],
    [
        "name" => "Ville",
        "email" => "ville@example.com"
    ],
    [
        "name" => "Mikko",
        "email" => "mikko@example.com"
    ]
];


$dbCustomers = [];
foreach ($customers as $customer) {
    $dbCustomers[] = [
        "customer_firstname" => $customer["name"],
        "customer_email" => $customer["email"]
    ];
}

$customers->map(function ($customer) {
    return [
        "customer_firstname" => $customer["name"],
        "customer_email" => $customer["email"]
    ];
});