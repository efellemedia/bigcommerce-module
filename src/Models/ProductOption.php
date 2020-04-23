<?php

namespace Modules\Bigcommerce\Models;

use Fusion\Concerns\CachesQueries;
use Fusion\Database\Eloquent\Model;

class ProductOption extends Model
{
    use CachesQueries;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_product_options';

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
     * Option value relationship.
     * One to Many
     * 
     * @return mixed
     */
    public function values()
    {
        return $this->hasMany(ProductOptionValue::class, 'option_id');
    }
}
