<?php
require __DIR__ . "/../vendor/autoload.php";
$items = [
    ["price" => 1.00, "stock" => 5, "name" => "Chair"],
    ["price" => 1000.00, "stock" => 4, "name" => "Chair 2.0"],
    ["price" => 5.00, "stock" => 3, "name" => "Desk"]
];

$totalStockValue = 0;
foreach ($items as $item) {
    $totalStockValue += $item["price"] * $item["stock"];
}
//4020

$items = collect($items);
$totalStockValue = $items->reduce(function ($curr, $item) {
    return $curr + $item["price"] * $item["stock"];
}, 0);
//4020