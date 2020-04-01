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

use App\Foundation\Concerns\CachesQueries;
use App\Foundation\Database\Eloquent\Model;

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
