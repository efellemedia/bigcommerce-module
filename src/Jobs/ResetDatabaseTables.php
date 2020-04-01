<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Jobs;

use Artisan;
use Exception;
use Illuminate\Support\Facades\Log;

class ResetDatabaseTables
{
    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('module:migrate:reset', ['slug' => 'bigcommerce']);
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        Log::error(__CLASS__, ['message' => $exception->getMessage()]);
    }
}
