<?php

namespace App\Queries\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CustomersQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        $customerRepository = resolve(CustomerRepositoryInterface::class);

        $builder = $customerRepository->getBuilder();

        parent::__construct($builder, $request);
        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
