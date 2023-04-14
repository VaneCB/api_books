<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;

class PruebasApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_get_all_books(): void
    {
        $book=Book::factory()->count(4)->create();
        $response = $this->getJson(route("books.index"));
        $response->assertJsonFragment([
            'titulo'=>$book[0]->titulo
        ])
            ->assertJsonFragment([
                'titulo'=>$book[1]->titulo
            ]);
        dd($book);
    }
}
