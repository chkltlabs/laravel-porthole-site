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

    public function test_home_page_exposes_core_seo_tags(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('<title>Laravel Porthole — MCP for Horizon, Pulse &amp; Telescope</title>', false);
        $response->assertSee('rel="canonical"', false);
        $response->assertSee('property="og:title"', false);
        $response->assertSee('name="twitter:card"', false);
        $response->assertSee('application/ld+json', false);
        $response->assertSee('SoftwareApplication', false);
        $response->assertSee('rel="author noopener"', false);
    }

    public function test_robots_and_sitemap_files_exist(): void
    {
        $this->assertFileExists(public_path('robots.txt'));
        $this->assertFileExists(public_path('sitemap.xml'));
        $this->assertFileExists(public_path('og-image.png'));
        $this->assertStringContainsString(
            'Sitemap: https://porthole.erikgratz.com/sitemap.xml',
            (string) file_get_contents(public_path('robots.txt')),
        );
    }
}
