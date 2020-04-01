<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Faker\Generator as Faker;
use Modules\Bigcommerce\Models\Product;
use Modules\Bigcommerce\Models\ProductImage;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(ProductImage::class, function (Faker $faker) {
    static $order = 1;
    return [
        'id'           => $order,
        'product_id'   => factory(Product::class)->create(),
        'description'  => $faker->text,
        'is_thumbnail' => 0,
        'url_standard' => $faker->imageUrl(300, 300),
        'sort_order'   => $order++,
    ];
});
