<?php 

namespace Core\Domain\Service;

class PrimeNumbers{

    private $minNumber;

    public function __construct()
    {   
        $this->minNumber = 2;
    }
    
    /**
     * Find prime numbers in descending order up to a given maximum number..
     * @param int $maxNumber The maximum number up to which to search for prime numbers.
     * @return array A matrix of prime numbers found in descending order.
     * @throws \InvalidArgumentException If the minimum value is greater or equal to $maxNumber.
     *                                    An exception is thrown with an error message.
     */
    public function findDescending(int $maxNumber): array
    {
        if ($this->minNumber >= $maxNumber) {
            throw new \InvalidArgumentException("Minimum value must be greater than or equal to 3");
        }

        $primeNumbers = [];
        for ($i = $this->minNumber; $i <= $maxNumber; $i++) {
            if ($this->isPrimeNumber($i)) {
                $primeNumbers[] = $i;
            }
        }
        rsort($primeNumbers);
    
        return $primeNumbers;
    }
    
    /**
     * Checks if a given number is prime.
     * @param int $number The number to be verified.
     * @return bool Returns true if the number is prime, otherwise returns false..
     */
    private function isPrimeNumber(int $number): bool
    {
        if ($number <= 1) {
            return false;
        }
    
        for ($i = $this->minNumber; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
    
        return true;
    }
    
}
