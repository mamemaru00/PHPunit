<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Book;

class DatabaseTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(
            Schema::hasColumns('books', [
                'id', 'title', 'author'
            ]),
            1
        );
        
    }

    public function testDatabase()
    {
        $book = new Book();
        $book->title = 'hoge';
        $book->author = 'tarou';
        $saveBook = $book->save();
 
        $this->assertTrue($saveBook);

        $book = [
            'title' => 'hoge',
        ];
        $this->assertDatabaseHas('books', $book);
    }

    
}
