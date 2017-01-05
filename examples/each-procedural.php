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

//Proseduraalinen
foreach ($customers as $customer) {
    mail($customer["email"], "Black Friday", "Osta kaikki, {$customer["name"]}!");
}

//Funktionaalinen
$customers = collect($customers);

$customers->each(function ($customer) {
    mail($customer["email"], "Black Friday", "Osta kaikki, {$customer["name"]}!");
});