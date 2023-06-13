<?php
use League\CommonMark\GithubFlavoredMarkdownConverter;

$router->get('/', function () use ($router) {  
    $appName = 'Descending Prime Numbers API';
    $appVersion = '1.0.0';
    $timestamp = new \DateTime();

    $data = [
        'name' => $appName, 
        'version' => $appVersion, 
        'timestamp' => $timestamp
    ];

    return response()->json($data);
});

$router->get('desc_prime_numbers/{maxNumber}', [
    'middleware' => 'validateMaxNumber', 
    'uses' => 'PrimeNumbersController@findDescPrimerNumbers'
]);