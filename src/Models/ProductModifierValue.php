<?php

namespace Modules\Bigcommerce\Models;

use Fusion\Concerns\CachesQueries;
use Fusion\Database\Eloquent\Model;

class ProductModifierValue extends Model
{
    use CachesQueries;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_product_modifier_values';

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'value_data' => 'collection',
        'adjusters'  => 'collection',
    ];

    /**
     * Parent relationship.
     * One to Many (Inverse)
     * 
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(ProductModifier::class, 'modifier_id');
    }
}
