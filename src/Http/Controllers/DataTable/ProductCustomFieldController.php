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
use Modules\Bigcommerce\Models\ProductCustomField;
use Fusion\Http\Controllers\DataTableController;

class ProductCustomFieldController extends DataTableController
{
    public function builder()
    {
        if (request()->route('product')) {
            return Product::find(request()->route('product'))->customfields()->getQuery();
        } else {
            return ProductCustomField::query();
        }
    }

    public function getDisplayableColumns()
    {
        return [
            'name',
            'value'
        ];
    }

    public function getFilterable()
    {
        return [
            'name',
            'value'
        ];
    }

    public function getSortable()
    {
        return [
            'name',
            'value'
        ];
    }

    public function getCustomColumnNames()
    {
        return [
            'name'  => 'Name',
            'value' => 'Value',
        ];
    }
}
