<?php

namespace Modules\Bigcommerce\Models;

use Fusion\Concerns\CachesQueries;
use Fusion\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use CachesQueries;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_product_variants';

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    /**
     * Product relationship.
     * One to Many (Inverse)
     * 
     * @return mixed
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Option relationship.
     * One to One
     * 
     * @return mixed
     */
    public function option()
    {
        return $this->hasOne(ProductOption::class);
    }

    /**
     * Option value relationship.
     * One to One
     * 
     * @return mixed
     */
    public function optionValue()
    {
        return $this->hasOne(ProductOptionValue::class);
    }
}
