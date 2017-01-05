<?php
require __DIR__ . "/../vendor/autoload.php";

$itemsByCategory = [
    "chairs" => [
        ["price" => 1.00, "name" => "Chair"],
        ["price" => 1000.00, "name" => "Chair 2.0"]
    ],
    "desks" => [
        ["price" => 5.00, "name" => "Desk"]
    ]
];

$allProducts = [];
foreach ($itemsByCategory as $items) {
    foreach ($items as $item) {
        $allProducts[] = $item;
    }
}

$itemsByCategory = collect($itemsByCategory);
$allProducts = $itemsByCategory->flatten(1);