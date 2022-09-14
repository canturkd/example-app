<?php

namespace App\Queries\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductsQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        $productRepository = resolve(ProductRepositoryInterface::class);

        $builder = $productRepository->getBuilder()
            ->with(['category']);

        parent::__construct($builder, $request);

        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
