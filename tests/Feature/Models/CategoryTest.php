<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryTest extends TestCase
{   
    use DatabaseMigrations;

    public function testList(): void
    {
        factory(Category::class, 2)->create();
        
        $categories = Category::all();

        self::assertCount(2, $categories);
    }

    public function testCreate(): void
    {
        $category = Category::create([
            'name' => 'CATEGORY_FAKE'
        ]);
        
        $category->refresh();

        self::assertEquals('CATEGORY_FAKE', $category->name);
        self::assertNull($category->description);
        self::assertTrue($category->is_active);
    }
    
    public function testUpdate(): void
    {
        /** @var Category $category */
        $category = factory(Category::class)->create();

        $category->update([
            'name' => 'CATEGORY_FAKE_UPDATED',
            'description' => 'DESCRIPTION_FAKE_UPDATED',
            'is_active' => false
        ]);

        self::assertEquals('CATEGORY_FAKE_UPDATED', $category->name);
        self::assertEquals('DESCRIPTION_FAKE_UPDATED', $category->description);
        self::assertFalse($category->is_active);
    }
}
