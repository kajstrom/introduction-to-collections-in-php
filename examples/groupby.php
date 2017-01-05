<?php
require __DIR__ . "/../vendor/autoload.php";
ini_set("display_errors", 1);

$customers = [
    [
        "name" => "Kaj",
        "lastname" => "Ström",
        "email" => "kaj.strom@kapsi.fi",
        "active" => true,
        "country" => "Finland"
    ],
    [
        "name" => "Ville",
        "lastname" => "Viklund",
        "email" => "ville@example.com",
        "active" => false,
        "country"=> "Mustasaari"
    ],
    [
        "name" => "Mikko",
        "lastname" => "Niemikorpi",
        "email" => "mikko@example.com",
        "active" => true,
        "country" => "Finland"
    ]
];

$customersByCountry = [];
foreach ($customers as $customer) {
    if (false === key_exists($customer["country"], $customersByCountry)) {
        $customersByCountry[$customer["country"]] = [];
    }

    $customersByCountry[$customer["country"]][] = $customer;
}


$customers = collect($customers);

$customersByCountry = $customers
    ->groupBy("country");

var_dump($customersByCountry->toArray());