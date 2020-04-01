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
use App\Http\Controllers\DataTableController;

class ProductController extends DataTableController
{
    public function builder()
    {
        return Product::query();
    }

    public function getDisplayableColumns()
    {
        return [
            'name',
            'sku',
            'is_featured',
            'is_visible',
        ];
    }

    public function getFilterable()
    {
        return [
            'name',
            'sku',
            'is_featured',
            'is_visible',
        ];
    }

    public function getSortable()
    {
        return [
            'name',
            'sku',
            'is_featured',
            'is_visible',
        ];
    }

    public function getCustomColumnNames()
    {
        return [
            'name'        => 'Name',
            'sku'         => 'SKU',
            'is_featured' => ' ',
            'is_visible'  => ' ',
        ];
    }
}
