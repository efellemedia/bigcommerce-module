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
use Modules\Bigcommerce\Models\ProductReview;
use App\Http\Controllers\DataTableController;

class ProductReviewController extends DataTableController
{
    public function builder()
    {
        if (request()->has('product')) {
            return Product::find(request()->route('product'))->reviews()->getQuery();
        } else {
            return ProductReview::query();
        }
    }

    public function getDisplayableColumns()
    {
        return [
            'name',
            'title',
            'text',
            'status',
            'rating',
            'date_created'
        ];
    }

    public function getFilterable()
    {
        return [
            'name',
            'title',
            'text',
            'rating',
            'date_created'
        ];
    }

    public function getSortable()
    {
        return [
            'name',
            'title',
            'rating',
            'date_created'
        ];
    }

    public function getCustomColumnNames()
    {
        return [
            'name'          => 'Name',
            'title'         => 'Reviewer',
            'text'          => 'Review',
            'rating'        => 'Rating',
            'status'        => ' ',
            'date_created'  => 'Created',
        ];
    }
}
