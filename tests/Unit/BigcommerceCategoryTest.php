<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Tests\Unit;

use Tests\Foundation\TestCase;
use Modules\Bigcommerce\Models\Product;
use Modules\Bigcommerce\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BigcommerceCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * @test
     * @group bigcommerce
     */
    public function has_product_relationships()
    {
    	$category = factory(Category::class)->create();
        $products = factory(Product::class, 3)->create();

        $category->products()->attach(
            $products->pluck('id')->toArray()
        );

        $this->assertEquals(3, $category->products->count());
        $this->assertContainsOnlyInstancesOf(Product::class, $category->products);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_a_parent_relationship()
    {
        $parent   = factory(Category::class)->create();
        $category = factory(Category::class)->create(['parent_id' => $parent->id]);

        $this->assertNull($parent->parent);
        $this->assertInstanceOf(Category::class, $category->parent);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_children()
    {
        $parent   = factory(Category::class)->create();
        $children = factory(Category::class, 3)->make();

        $parent->children()->saveMany($children);

        $this->assertEquals(3, $parent->children->count());
        $this->assertContainsOnlyInstancesOf(Category::class, $parent->children);
    }
}