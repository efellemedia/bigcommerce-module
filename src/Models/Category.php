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

use App\Concerns\CachesQueries;
use App\Database\Eloquent\Model;

class Category extends Model
{
    use CachesQueries;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_categories';

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    /**
     * Category parent relationship.
     * One to Many (Inverse)
     * 
     * @return Relationship Builder
     */
    public function parent()
    {
    	return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    /**
     * Category parent relationship.
     * One to Many
     * 
     * @return Relationship Builder
     */
    public function children()
    {
    	return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    /**
     * Product relationship.
     * Many to Many
     * 
     * @return Relationship Builder
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'bigcommerce_category_product');
    }
}
