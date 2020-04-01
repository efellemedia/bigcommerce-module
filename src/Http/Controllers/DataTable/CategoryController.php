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

use Modules\Bigcommerce\Models\Category;
use App\Http\Controllers\DataTableController;

class CategoryController extends DataTableController
{
    public function builder()
    {
        return Category::query();
    }

    public function getDisplayableColumns()
    {
        return [
            'image_url',
            'name',
            'description',
            'is_visible',
        ];
    }

    public function getFilterable()
    {
        return [
            'name',
            'is_visible',
        ];
    }

    public function getSortable()
    {
        return [
            'name',
            'is_visible',
        ];
    }

    public function getCustomColumnNames()
    {
        return [
            'image_url'   => ' ',
            'name'        => 'Name',
            'description' => 'Description',
            'is_visible'  => ' ',
        ];
    }
}
