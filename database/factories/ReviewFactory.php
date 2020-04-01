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
use Modules\Bigcommerce\Models\ProductReview;

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

$factory->define(ProductReview::class, function (Faker $faker) {
    static $order = 1;
    return [
        'id'         => $order++,
        'product_id' => factory(Product::class)->create(),
        'name'       => $faker->word,
        'title'      => $faker->word,
        'text'       => $faker->text,
        'status'     => $faker->randomElement(['approved', 'pending', 'disapproved']),
        'rating'     => $faker->numberBetween(0, 5),
        
        'date_created'  => $faker->dateTimeThisMonth('yesterday')->format('H:i:s Y-m-d'),
        'date_modified' => $faker->dateTimeThisMonth()->format('H:i:s Y-m-d'),
        'date_reviewed' => $faker->dateTimeThisMonth()->format('H:i:s Y-m-d'),
    ];
});
