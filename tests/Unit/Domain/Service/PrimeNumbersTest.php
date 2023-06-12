<?php
namespace Tests\Unit\Domain\Service;

use Core\Domain\Service\PrimeNumbers;
use PHPUnit\Framework\TestCase;

class PrimeNumbersTest extends TestCase
{
    /**
     * @test
     */
    public function test_find_descending_HAPPY_PATH()
    {
        $primeNumbersService = new PrimeNumbers();
        $expected = [7, 5, 3, 2];

        $result = $primeNumbersService->findDescending(10);
        
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function test_find_descending_invalid_max_number_UNHAPPY_PATH()
    {
        $this->expectException(\InvalidArgumentException::class);
        $primeNumbersService = new PrimeNumbers();
        $primeNumbersService->findDescending(2);
    }

    /**
     * @test
     */
    public function test_find_descending_number_max_number_is_lower_than_the_minimum_UNHAPPY_PATH()
    {
        $this->expectException(\InvalidArgumentException::class);
        $primeNumbersService = new PrimeNumbers();
        $primeNumbersService->findDescending(1);
    }
}
