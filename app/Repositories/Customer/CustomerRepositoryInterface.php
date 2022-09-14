<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface CustomerRepositoryInterface
{
    /**
     * @return Customer
     */
    public function getModel(): Customer;

    /**
     * @return Customer|Builder
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
     * @return Customer[]|Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @return Customer
     */
    public function findOrFail(string $id): Customer;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Customer
     */
    public function create(array $attributes): Customer;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @param array $options
     * @return Customer
     */
    public function update(array $attributes, string $id, array $options = []): Customer;

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Customer
     * @throws Exception
     */
    public function destroy(string $id): Customer;
}
