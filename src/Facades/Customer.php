<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Facades;

use Illuminate\Support\Facades\Facade;

class Customer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bigcommerce_customer';
    }
}
