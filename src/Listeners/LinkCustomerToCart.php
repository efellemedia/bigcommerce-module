<?php

namespace Modules\Bigcommerce\Listeners;

use Exception;
use Fusion\Events\UserRegistered;
use Illuminate\Support\Facades\Log;
use Modules\Bigcommerce\Facades\Cart;

class LinkCustomerToCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Cart::updateCustomerID();
    }

    /**
     * Handle a job failure.
     *
     * @param  UserRegistered  $event
     * @param  Exception  $exception
     * @return void
     */
    public function failed(UserRegistered $event, Exception $exception)
    {
        Log::error('[Event Listener]', [
            'event'   => UserRegistered::class,
            'message' => $exception->getMessage()
        ]);
    }
}