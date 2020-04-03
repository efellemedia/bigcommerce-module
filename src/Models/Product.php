<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Models;

use App\Concerns\IsSearchable;
use App\Concerns\CachesQueries;
use App\Database\Eloquent\Model;

class Product extends Model
{
    use CachesQueries, IsSearchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_products';

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    /**
     * The path to the product.
     * 
     * @return string
     */
    public function path()
    {
        return "/store/{$this->slug}";
    }
    
    /**
     * Get the formatted weight value of the product.
     * 
     * @return string
     */
    public function weight()
    {
        $settings = Store::whereIn('key', ['weight_units', 'decimal_places'])
            ->pluck('value', 'key');
        
        return number_format($this->weight, $settings->get('decimal_places')).' '.$settings->get('weight_units');
    }

    /**
     * Category relationship.
     * Many to Many
     * 
     * @return mixed
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'bigcommerce_category_product');
    }

    /**
     * Related relationship.
     * Many to Many
     * 
     * @return mixed
     */
    public function related()
    {
        return $this->belongsToMany(Product::class, 'bigcommerce_product_related', 'product_id', 'related_id');
    }

    /**
     * Variant relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Option relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }

    /**
     * Modifier relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function modifiers()
    {
        return $this->hasMany(ProductModifier::class);
    }

    /**
     * Image relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Video relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }

    /**
     * Custom fields relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function customfields()
    {
        return $this->hasMany(ProductCustomField::class);
    }

    /**
     * Review relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    /**
     * Rule relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function rules()
    {
        return $this->hasMany(ProductRule::class);
    }
}
