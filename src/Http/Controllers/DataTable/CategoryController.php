<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Http\Controllers\DataTable;

use Modules\Bigcommerce\Models\Product;
use Modules\Bigcommerce\Models\Category;
use App\Http\Controllers\DataTableController;

class CategoryController extends DataTableController
{
    public function builder()
    {
        if (request()->route('product')) {
            return Product::find(request()->route('product'))->categories()->getQuery();
        } else {
            return Category::query();
        }
    }

    public function getDisplayableColumns()
    {
        return [
            'image_url',
            'name',
            'description',
        ];
    }

    public function getFilterable()
    {
        return [
            'name',
            'description',
        ];
    }

    public function getSortable()
    {
        return [
            'name',
        ];
    }

    public function getCustomColumnNames()
    {
        return [
            'image_url'   => ' ',
            'name'        => 'Name',
            'description' => 'Description',
        ];
    }
}
