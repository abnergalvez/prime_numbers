<?php
use League\CommonMark\GithubFlavoredMarkdownConverter;

$router->get('/', function () use ($router) {  
    $converter = new GithubFlavoredMarkdownConverter();
    $indexView =  $converter->convert(file_get_contents(base_path() . '/README.md'));
    return view('index')->with('indexView', $indexView);
});

$router->get('desc_prime_numbers/', function (){
    return redirect('/');
});

$router->get('desc_prime_numbers/{maxNumber}', [
    'middleware' => 'validateMaxNumber', 
    'uses' => 'PrimeNumbersController@findDescPrimerNumbers'
]);