<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
    }
    

    public function testFillableAttribute(): void
    {
        $expected = [
            'name', 'description', 'is_active'
        ];

        self::assertEquals($expected, $this->category->getFillable());
    }

    public function testIfUseTraits(): void
    {
        $expected = [
            Uuid::class,
            SoftDeletes::class,
        ];
        
        $traits = array_keys(class_uses(Category::class));

        self::assertEquals($expected, $traits);
    }

    public function testCastsAttribute(): void
    {
        $expected = [
            'id' => 'string',
            'is_active' => 'boolean',
        ];

        self::assertEquals($expected, $this->category->getCasts());
    }

    public function testIncrementingAttribute(): void
    {
        self::assertFalse($this->category->incrementing);
    }
}
