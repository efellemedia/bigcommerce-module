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
use Modules\Bigcommerce\Models\ProductImage;
use App\Http\Controllers\DataTableController;

class ProductImageController extends DataTableController
{
    public function builder()
    {
        if (request()->route('product')) {
            return Product::find(request()->route('product'))->images()->getQuery();
        } else {
            return ProductImage::query();
        }
    }

    public function getDisplayableColumns()
    {
        return [
            'url_standard',
            'description',
            'is_thumbnail',
        ];
    }

    public function getFilterable()
    {
        return [
            'description',
        ];
    }

    public function getSortable()
    {
        return [
            'description'
        ];
    }

    public function getCustomColumnNames()
    {
        return [
            'url_standard' => ' ',
            'description'  => 'Description',
            'is_thumbnail' => ' ',
        ];
    }
}
