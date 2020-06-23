<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
class ViewMovieTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function the_main_page_shows_correct_info()
    {
        Http::fake();
        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
    }
}
