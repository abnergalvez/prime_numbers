<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ControllerTest extends TestCase
{
    /**
     * @test
     */
    public function test_base_endpoint_returns_a_successful_status_HAPPY_PATH()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

    /**
     * @test
     */
    public function test_endpoint_when_parameter_is_letter_UNHAPPY_PATH()
    {
        $response = $this->call('GET', '/desc_prime_numbers/a');

        $this->assertEquals('Bad Request', $response->statusText());
        $this->assertEquals(400, $response->status());
    }

    /**
     * @test
     */
    public function test_endpoint_without_parameter_or_not_found_route()
    {
        $response = $this->call('GET', '/asdasd');
        
        $this->assertEquals(404, $response->status());
    }

    /**
     * @test
     */
    public function test_full_HAPPY_PATH()
    {
        $jsonResponseExpect = [7,5,3,2];

        $response = $this->call('GET', '/desc_prime_numbers/10');

        $this->assertEquals(200, $response->status());
        $this->assertEquals($jsonResponseExpect, $response['numbers']);
    }
}
