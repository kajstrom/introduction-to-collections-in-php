<?php
require __DIR__ . "/../vendor/autoload.php";
/*
 * Idea is from Martin Fowler's article, translated to PHP
 * http://martinfowler.com/articles/collection-pipeline/
 */

$dataSet = [
    [
        "title" => "Article 1",
        "tags" => ["tag1", "tag2"],
        "words" => 100
    ],
    [
        "title" => "Article 2",
        "tags" => ["tag2"],
        "words" => 100
    ],
    [
        "title" => "Article 3",
        "tags"=> ["tag1"],
        "words" => 100
    ],
    [
        "title" => "Article 4",
        "tags" => ["tag1"],
        "words" => 100
    ]
];

$articles = collect($dataSet);
$tagArticles = $articles
    ->flatMap(function($article) {
        return collect($article["tags"])->map(function ($tag) use($article) {
            return ["tag" => $tag, "article" =>  $article];
        });
    })
    ->groupBy("tag")
    ->map(function ($tagArticlePairs) {
       return collect($tagArticlePairs)->map(function ($tagArticlePair) {
           return $tagArticlePair["article"];
       });
    })
    ->map(function($tagArticles) {
        $tagArticles = collect($tagArticles);

        return [
            "articles" => $tagArticles->count(),
            "words" => $tagArticles->sum("words")
        ];
    });

var_dump($tagArticles->toArray());
