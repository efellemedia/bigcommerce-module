<?php

namespace Modules\Bigcommerce\Models;

use Fusion\Models\User;
use Firebase\JWT\JWT;
use Fusion\Concerns\CachesQueries;
use Fusion\Database\Eloquent\Model;
use Modules\Bigcommerce\Facades\Customer as CustomerSupport;

class Customer extends Model
{
    use CachesQueries;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bigcommerce_customers';

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    /**
     * User relationship.
     * One to One (Inverse)
     * 
     * @return Relationship Builder
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Get BigCommerce Customer Group attribute.
     * 
     * @return Collection
     */
    public function getGroupAttribute()
    {
        return CustomerSupport::group($this->group_id);
    }

    /**
     * Get customer login token for BigCommerce logins.
     *
     * @return string
     */
    public function getloginTokenAttribute()
    {
        return CustomerSupport::loginToken($this->id);
    }
}
