<?php
require __DIR__ . "/../vendor/autoload.php";
$categories = [
    [
        "name" => "Chairs",
        "id" => 1,
        "items" => [
            ["price" => 1.00, "name" => "Chair"],
            ["price" => 1000.00, "name" => "Chair 2.0"]
        ]
    ],
    [
        "name" => "Desks",
        "id" => 2,
        "items" => [
            ["price" => 5.00, "name" => "Desk"]
        ]
    ]
];

$allProducts = [];
foreach ($categories as $category) {
    foreach ($category["items"] as $item) {
        $allProducts[] = $item;
    }
}

$categories = collect($categories);
$allProducts = $categories->map(function ($category) {
    return $category["items"];
})->flatten(1);

$categories = collect($categories);
$allProducts = $categories->flatMap(function ($category) {
    return $category["items"];
});