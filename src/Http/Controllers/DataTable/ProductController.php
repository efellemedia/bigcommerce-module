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

class ProductController extends DataTableController
{
    public function builder()
    {
        if (request()->route('category')) {
            return Category::find(request()->route('category'))->products()->getQuery();
        } elseif (request()->route('product')) {
            return Product::find(request()->route('product'))->related()->getQuery();
        } else {
            return Product::query();
        }
    }

    public function getDisplayableColumns()
    {
        return [
            'name',
            'sku',
            'is_featured',
        ];
    }

    public function getFilterable()
    {
        return [
            'name',
            'sku',
            'is_featured',
        ];
    }

    public function getSortable()
    {
        return [
            'name',
            'sku',
            'is_featured',
        ];
    }

    public function getCustomColumnNames()
    {
        return [
            'name'        => 'Name',
            'sku'         => 'SKU',
            'is_featured' => ' ',
        ];
    }
}
