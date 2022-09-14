<?php

namespace App\Http\Controllers;

use App\Events\Customer\CustomerCreated;
use App\Events\Customer\CustomerDeleted;
use App\Events\Customer\CustomerUpdated;
use App\Http\Requests\Customer\CustomerStoreRequest;
use App\Http\Requests\Customer\CustomerUpdateRequest;
use App\Http\Resources\Customer\CustomerCollection;
use App\Http\Resources\Customer\CustomerResource;
use App\Queries\Customer\CustomersQuery;
use App\Services\Customer\CustomerServiceInterface;
use Exception;

class CustomerController extends Controller
{
    /**
     * @var CustomerServiceInterface
     */
    public CustomerServiceInterface $customerService;

    /**
     * CustomerController constructor.
     * @param CustomerServiceInterface $customerService
     */
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return CustomerCollection
     */
    public function index(): CustomerCollection
    {
        $customers = (new CustomersQuery())->safelyPaginate();

        return new CustomerCollection($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerStoreRequest $request
     * @return CustomerResource
     */
    public function store(CustomerStoreRequest $request): CustomerResource
    {
        $data = $request->validated();

        $customer = $this->customerService->createCustomer($data);

        event(new CustomerCreated($customer));

        return new CustomerResource($customer);
    }

    /**
     * @param string $id
     * @return CustomerResource
     */
    public function show(string $id): CustomerResource
    {
        $customer = $this->customerService->getCustomerById($id);

        return new CustomerResource($customer);
    }

    /**
     * @param CustomerUpdateRequest $request
     * @param string $id
     * @return CustomerResource
     */
    public function update(CustomerUpdateRequest $request, string $id): CustomerResource
    {
        $customer = $this->customerService->updateCustomer($request->validated(), $id);

        event(new CustomerUpdated($customer));

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return CustomerResource
     * @throws Exception
     */
    public function destroy(string $id): CustomerResource
    {
        $customer = $this->customerService->destroyCustomer($id);

        event(new CustomerDeleted($customer));

        return new CustomerResource($customer);
    }
}
