<?php
$customers = [
    [
        "name" => "Kaj",
        "email" => "kaj.strom@kapsi.fi",
        "active" => true
    ],
    [
        "name" => "Ville",
        "email" => "ville@example.com",
        "active" => false,
    ],
    [
        "name" => "Mikko",
        "email" => "mikko@example.com",
        "active" => true
    ]
];

$activeCustomers = [];
foreach ($customers as $customer) {
    if ($customer["active"]) {
        $activeCustomers[] = $customer;
    }
}

$customers = collect($customers);

$activeCustomers = $customers->filter(function ($customer) {return $customer["active"];});