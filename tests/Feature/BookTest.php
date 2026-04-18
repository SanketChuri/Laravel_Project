<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_page_loads(): void
    {
        $this->withoutExceptionHandling();
        Book::create([
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'genre' => 'Self Help',
            'published_year' => 2018,
            'quantity' => 5,
        ]);

        $response = $this->get('/books');

        $response->assertStatus(200);
        $response->assertSee('Atomic Habits');
    }
}