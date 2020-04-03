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

use App\Models\User;
use Firebase\JWT\JWT;
use App\Concerns\CachesQueries;
use App\Database\Eloquent\Model;
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
