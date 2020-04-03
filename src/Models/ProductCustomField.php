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

class ProductCustomField extends Model
{
    use CachesQueries, IsSearchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_product_custom_fields';

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
