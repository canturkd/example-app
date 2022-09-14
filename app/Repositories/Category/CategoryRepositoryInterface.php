<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface CategoryRepositoryInterface
{
    /**
     * @return Category
     */
    public function getModel(): Category;

    /**
     * @return Category|Builder
     */
    public function getBuilder();

    /**
     * @param Builder $builder
     * @return $this
     */
    public function setBuilder(Builder $builder);

    /**
     * Get all of the models from the database.
     *
     * @param string[] $columns
     * @return Category[]|Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return Category
     */
    public function findOrFail(string $id): Category;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Category
     */
    public function create(array $attributes): Category;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return Category
     */
    public function update(array $attributes, string $id, array $options = []): Category;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Category
     * @throws Exception
     */
    public function destroy(string $id): Category;
}
