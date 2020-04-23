<?php

namespace Modules\Bigcommerce\Models;

use Fusion\Concerns\CachesQueries;
use Fusion\Database\Eloquent\Model;

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
    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'description',
        'image_url',
        'is_visible',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_visible' => 'boolean'
    ];

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
