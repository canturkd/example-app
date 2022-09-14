<?php

namespace App\Services\Customer;

use App\Models\Customer;
use Exception;

interface CustomerServiceInterface
{
    /**
     * @param array $data
     * @return Customer
     */
    public function createCustomer(array $data): Customer;

    /**
     * @param string $id
     * @return Customer
     */
    public function getCustomerById(string $id): Customer;

    /**
     * @param array $data
     * @param string $id
     * @return Customer
     */
    public function updateCustomer(array $data, string $id): Customer;

    /**
     * @param string $id
     * @return Customer
     * @throws Exception
     */
    public function destroyCustomer(string $id): Customer;
}
