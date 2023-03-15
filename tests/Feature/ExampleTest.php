<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {

        $response = $this->get('/register');

        $response->assertStatus(200);

        // $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();
        // foreach ($routeCollection as $value) {
        //     $response = $this->call($value->getMethods()[0], $value->getPath());
        //     // $this->assertNotEquals(500, $response->status(), "{$value->getMethods()[0]} {$value->getPath()}");
        //     $response->assertStatus(200);
        // }

    }
}
