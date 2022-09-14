<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface ProductRepositoryInterface
{
    /**
     * @return Product
     */
    public function getModel(): Product;

    /**
     * @return Product|Builder
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
     * @return Product[]|Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return Product
     */
    public function findOrFail(string $id): Product;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Product
     */
    public function create(array $attributes): Product;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return Product
     */
    public function update(array $attributes, string $id, array $options = []): Product;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Product
     * @throws Exception
     */
    public function destroy(string $id): Product;

    /**
     * @param array $ids
     * @return int
     */
    public function getSumPriceProductByIds(array $ids): int;
}
