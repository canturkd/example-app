<?php

namespace App\Queries\Discount;

use App\Repositories\Discount\DiscountRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DiscountsQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        $discountRepository = resolve(DiscountRepositoryInterface::class);

        $builder = $discountRepository->getBuilder();

        parent::__construct($builder, $request);

        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
