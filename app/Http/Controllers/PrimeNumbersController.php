<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Core\Domain\Service\PrimeNumbers;

class PrimeNumbersController extends Controller
{
    private $service;

    public function  __construct(PrimeNumbers $service)
    {
        $this->service = $service;
    }

    /**
     * Find prime numbers in descending order up to a given maximum number.
     * @param int $maxNumber The maximum number up to which to search for prime numbers.
     * @return \Illuminate\Http\JsonResponse A JSON response with an array of prime numbers found in descending order.
     *                                         The format of the response is:
     *                                         {
     *                                             "numbers": [2, 3, 5, ...]
     *                                         }
     * @throws \InvalidArgumentException If an error occurs when finding prime numbers.
     *                                    The error message is included in the error JSON response.
     */ 
    public function findDescPrimerNumbers(int $maxNumber)
    {
        try {
            $primeNumbers = $this->service->findDescending($maxNumber);
            return response()->json(['numbers' => $primeNumbers], 200);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
