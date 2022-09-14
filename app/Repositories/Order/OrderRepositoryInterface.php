<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface OrderRepositoryInterface
{
    /**
     * @return Order
     */
    public function getModel(): Order;

    /**
     * @return Order|Builder
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
     * @return Order[]|Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return Order
     */
    public function findOrFail(string $id): Order;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Order
     */
    public function create(array $attributes): Order;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return Order
     */
    public function update(array $attributes, string $id, array $options = []): Order;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Order
     * @throws Exception
     */
    public function destroy(string $id): Order;

    /**
     * @param int $customerId
     * @return mixed
     */
    public function findOrderByCustomerId(int $customerId);
}
