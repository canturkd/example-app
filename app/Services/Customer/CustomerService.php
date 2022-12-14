<?php

namespace App\Services\Customer;

use App\Models\Customer;
use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerService implements CustomerServiceInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    public CustomerRepositoryInterface $customerRepository;

    /**
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @inheritDoc
     */
    public function createCustomer(array $data): Customer
    {
        $customer = $this->customerRepository->create($data);

        return $customer;
    }

    /**
     * @inheritDoc
     */
    public function getCustomerById(string $id): Customer
    {
        return $this->customerRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateCustomer(array $data, string $id): Customer
    {
        $customer = $this->customerRepository->update($data, $id);

        return $customer;
    }

    /**
     * @inheritDoc
     */
    public function destroyCustomer(string $id): Customer
    {
        $customer = $this->customerRepository->destroy($id);

        return $customer;
    }
}
