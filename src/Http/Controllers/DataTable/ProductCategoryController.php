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

use Illuminate\Http\Request;
use Modules\Bigcommerce\Models\Product;
use Modules\Bigcommerce\Models\Category;
use App\Http\Controllers\DataTableController;
use Spatie\QueryBuilder\{AllowedFilter,QueryBuilder};

class ProductCategoryController extends DataTableController
{
    public function builder()
    {
        return QueryBuilder::for(Category::class)
            ->allowedFilters([
                implode(',', self::getFilterable()),
                AllowedFilter::exact('products.id')->default(request()->route('product'))
            ])
            ->allowedFields(self::getDisplayableColumns())
            ->allowedIncludes('products')
            ->allowedSorts(self::getSortable())
            ->defaultSort('name');
    }

    protected function getRecords(Request $request)
    {
        return $this->builder->paginate(50);
    }

    public function getDisplayableColumns()
    {
        return [
            'name',
        ];
    }

    public function getFilterable()
    {
        return [
            'name',
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
            'name' => 'Name',
        ];
    }
}
