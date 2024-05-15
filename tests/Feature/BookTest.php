<?php

namespace Tests\Feature;
use Tests\TestCase;


class BookTest extends TestCase
{
    public function test_book_search(): void
    {
        $response = $this->get('/search/book?q=test');

        $response->assertStatus(200)->assertJsonStructure([
            'data',
            'meta',
            'links'
        ]);
    }
}
