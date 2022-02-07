<?php

namespace Tests\Unit\Models;

use App\Models\Genre;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\TestCase;

class GenreTest extends TestCase
{
    private Genre $genre;

    protected function setUp(): void
    {
        parent::setUp();
        $this->genre = new Genre();
    }
    

    public function testFillableAttribute(): void
    {
        $expected = [
            'name', 'is_active'
        ];

        self::assertEquals($expected, $this->genre->getFillable());
    }

    public function testIfUseTraits(): void
    {
        $expected = [
            Uuid::class,
            SoftDeletes::class,
        ];
        
        $traits = array_keys(class_uses(Genre::class));

        self::assertEquals($expected, $traits);
    }

    public function testCastsAttribute(): void
    {
        $expected = [
            'id' => 'string',
            'is_active' => 'boolean',
        ];

        self::assertEquals($expected, $this->genre->getCasts());
    }

    public function testIncrementingAttribute(): void
    {
        self::assertFalse($this->genre->incrementing);
    }
}
