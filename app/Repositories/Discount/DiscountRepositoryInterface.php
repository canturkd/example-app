<?php

namespace App\Repositories\Discount;

use App\Models\Discount;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface DiscountRepositoryInterface
{
    /**
     * @return Discount
     */
    public function getModel(): Discount;

    /**
     * @return Discount|Builder
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
     * @return Discount[]|Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return Discount
     */
    public function findOrFail(string $id): Discount;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Discount
     */
    public function create(array $attributes): Discount;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return Discount
     */
    public function update(array $attributes, string $id, array $options = []): Discount;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Discount
     * @throws Exception
     */
    public function destroy(string $id): Discount;

    /**
     * @param int $id
     */
    public function getDiscountByOrderId(int $id);
}
