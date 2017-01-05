<?php
require __DIR__ . "/../vendor/autoload.php";

$items = ["Chair", "Desk", "Table"];
$prices = [100, 150, 200];


$itemAndPrice = [];
foreach ($items as $idx => $item) {
    $itemAndPrice[] = [
        $item,
        $prices[$idx]
    ];
}


$items = collect($items);
$prices = collect($prices);

$itemAndPrice = $items->zip($prices);