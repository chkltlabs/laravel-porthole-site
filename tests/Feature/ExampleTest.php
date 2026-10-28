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
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('See the full picture, right away.', false);
        $response->assertSee('composer require chkltlabs/laravel-porthole', false);
        $response->assertSee('viewPorthole', false);
    }
}
