<?php

namespace App\Queries\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CategoriesQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        $categoryRepository = resolve(CategoryRepositoryInterface::class);

        $builder = $categoryRepository->getBuilder();

        parent::__construct($builder, $request);

        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
