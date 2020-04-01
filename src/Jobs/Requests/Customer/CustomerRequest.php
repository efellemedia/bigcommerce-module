<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Jobs\Requests\Customer;

use Exception;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Modules\Bigcommerce\Models\Customer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CustomerRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * API request endpoint.
     * 
     * @var string
     */
    private $endpoint = "v2/customers";

    /**
     * Request method.
     * 
     * @var string
     */
    private $method = "GET";

    /**
     * Request query - page number.
     * 
     * @var integer
     */
    private $page = 1;

    /**
     * Request query - limit.
     * 
     * @var integer
     */
    private $limit = 100;

    /**
     * ID of resource (optional)
     * 
     * @var integer|null
     */
    private $id;

    /**
     * Request query.
     * 
     * @var array
     */
    private $query = [];

    /**
     * User reference array.
     *
     * @var array
     */
    private $users = [];

    /**
     * Create a new job instance.
     *
     * @param  integer $id
     * @param  array   $query
     * @return void
     */
    public function __construct($id = null, $query = [])
    {
        $this->id        = $id;
        $this->endpoint .= ! is_null($id) ? "/" . $id : "";

        $this->query = array_merge([
            'page'  => $this->page,
            'limit' => $this->limit,
        ], $query);

        $this->users = User::all()->pluck('id', 'email');
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $response   = resolve('requestor')->request($this->endpoint, $this->method, [
            'query' => $this->query,
            'total' => $this->getCount()
        ]);
        $items      = $response->get('data');
        $pagination = $response->get('pagination');

        if (! is_null($this->id)) {
            $this->createOrUpdate($items);
        } else {
            $items->each(function($item, $key) {
                $this->createOrUpdate($item);
            });
        }

        // BigCommerce only allows a max of 250 items to be pulled at a time.
        // We'll use the `pagination` value to cycle through the next set..
        if (! is_null($pagination)) {
            if ($pagination->hasMorePages()) {
                $newQuery = $this->query;
                $newQuery['page'] = $pagination->currentPage() + 1;

                dispatch(new CustomerRequest($this->id, $newQuery));
            }
        }
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        Log::error('[BigCommerce API Request]', ['message' => $exception->getMessage()]);
    }

    /**
     * Create or update database entry.
     *
     * @param  Collection $item
     * @return void
     */
    public function createOrUpdate($item)
    {
        return Customer::updateOrCreate([ 'id' => $item->id ],
            [
                'user_id'    => $this->users[$item->email] ?? null,
                'group_id'   => $item->customer_group_id,
                'first_name' => $item->first_name,
                'last_name'  => $item->last_name,
                'email'      => $item->email,
            ]
        );
    }

    /**
     * Get total resource count.
     * 
     * Note:
     *   Only necessary for `v2` BigCommerce API calls.
     *   
     * @return int
     */
    private function getCount()
    {
        return resolve('requestor')
            ->request($this->endpoint . '/count', 'GET')
            ->get('data')
            ->count;
    }
}
