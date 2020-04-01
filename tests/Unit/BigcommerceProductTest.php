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
use Modules\Bigcommerce\Models\ProductRule;
use Modules\Bigcommerce\Models\ProductImage;
use Modules\Bigcommerce\Models\ProductVideo;
use Modules\Bigcommerce\Models\ProductOption;
use Modules\Bigcommerce\Models\ProductReview;
use Modules\Bigcommerce\Models\ProductVariant;
use Modules\Bigcommerce\Models\ProductModifier;
use Modules\Bigcommerce\Models\ProductCustomField;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BigcommerceProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group bigcommerce
     */
    public function has_a_slug_property()
    {
        $name    = 'Awesome Socks';
        $slug    = str_slug($name);
        $product = factory(Product::class)->create(['name' => $name, 'slug' => $slug]);

        $this->assertEquals($slug, $product->slug);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function belongs_to_many_category_relationships()
    {
    	$product    = factory(Product::class)->create();
        $categories = factory(Category::class, 3)->create();

        $product->categories()->attach(
            $categories->pluck('id')->toArray()
        );

        $this->assertEquals(3, $product->categories->count());
        $this->assertContainsOnlyInstancesOf(Category::class, $product->categories);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function belongs_to_many_related_product_relationships()
    {
        $product = factory(Product::class)->create();
        $related = factory(Product::class, 3)->create();

        $product->related()->attach(
            $related->pluck('id')->toArray()
        );

        $this->assertEquals(3, $product->related->count());
        $this->assertContainsOnlyInstancesOf(Product::class, $product->related);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_variant_relationships()
    {
        $product = factory(Product::class)->create();
        $variant = factory(ProductVariant::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->variants->count());
        $this->assertContainsOnlyInstancesOf(ProductVariant::class, $product->variants);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_option_relationships()
    {
        $product = factory(Product::class)->create();
        $options = factory(ProductOption::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->options->count());
        $this->assertContainsOnlyInstancesOf(ProductOption::class, $product->options);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_modifier_relationships()
    {
        $product   = factory(Product::class)->create();
        $modifiers = factory(ProductModifier::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->modifiers->count());
        $this->assertContainsOnlyInstancesOf(ProductModifier::class, $product->modifiers);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_image_relationships()
    {
        $product = factory(Product::class)->create();
        $images  = factory(ProductImage::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->images->count());
        $this->assertContainsOnlyInstancesOf(ProductImage::class, $product->images);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_video_relationships()
    {
        $product = factory(Product::class)->create();
        $videos  = factory(ProductVideo::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->videos->count());
        $this->assertContainsOnlyInstancesOf(ProductVideo::class, $product->videos);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_custom_field_relationships()
    {
        $product      = factory(Product::class)->create();
        $customfields = factory(ProductCustomField::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->customfields->count());
        $this->assertContainsOnlyInstancesOf(ProductCustomField::class, $product->customfields);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_review_relationships()
    {
        $product = factory(Product::class)->create();
        $reviews = factory(ProductReview::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->reviews->count());
        $this->assertContainsOnlyInstancesOf(ProductReview::class, $product->reviews);
    }

    /** 
     * @test
     * @group bigcommerce
     */
    public function can_have_many_rule_relationships()
    {
        $product = factory(Product::class)->create();
        $rules   = factory(ProductRule::class, 3)->create(['product_id' => $product->id]);

        $this->assertEquals(3, $product->rules->count());
        $this->assertContainsOnlyInstancesOf(ProductRule::class, $product->rules);
    }
}