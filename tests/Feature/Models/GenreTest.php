<?php

namespace Tests\Feature\Models;

use App\Models\Genre;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GenreTest extends TestCase
{   
    use DatabaseMigrations;

    public function testList(): void
    {
        factory(Genre::class, 2)->create();
        
        $genres = Genre::all();

        self::assertCount(2, $genres);
    }

    public function testCreate(): void
    {
        $genre = Genre::create([
            'name' => 'GENRE_FAKE'
        ]);
        
        $genre->refresh();

        self::assertEquals('GENRE_FAKE', $genre->name);
        self::assertTrue($genre->is_active);
    }
    
    public function testUpdate(): void
    {
        /** @var Genre $category */
        $genre = factory(Genre::class)->create();

        $genre->update([
            'name' => 'GENRE_FAKE_UPDATED',
            'is_active' => false
        ]);

        self::assertEquals('GENRE_FAKE_UPDATED', $genre->name);
        self::assertFalse($genre->is_active);
    }
}
