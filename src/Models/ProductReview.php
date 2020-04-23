<?php

namespace Modules\Bigcommerce\Models;

use Fusion\Concerns\CachesQueries;
use Fusion\Database\Eloquent\Model;

class ProductReview extends Model
{
    use CachesQueries;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_product_reviews';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

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
}
