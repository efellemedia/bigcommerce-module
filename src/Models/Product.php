<?php

namespace Modules\Bigcommerce\Models;

use Fusion\Concerns\CachesQueries;
use Fusion\Database\Eloquent\Model;

class Product extends Model
{
    use CachesQueries;

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
