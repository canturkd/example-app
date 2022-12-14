<?php

namespace App\Http\Controllers;

use App\Events\Product\ProductCreated;
use App\Events\Product\ProductDeleted;
use App\Events\Product\ProductUpdated;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Queries\Product\ProductsQuery;
use App\Services\Product\ProductServiceInterface;
use Exception;

class ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    public ProductServiceInterface $productService;

    /**
     * ProductController constructor.
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return ProductCollection
     */
    public function index(): ProductCollection
    {
        $products = (new ProductsQuery())->safelyPaginate();

        return new ProductCollection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return ProductResource
     */
    public function store(ProductStoreRequest $request): ProductResource
    {
        $data = $request->validated();

        $product = $this->productService->createProduct($data);

        $product->load(['category']);

        event(new ProductCreated($product));

        return new ProductResource($product);
    }

    /**
     * @param string $id
     * @return ProductResource
     */
    public function show(string $id): ProductResource
    {
        $product = $this->productService->getProductById($id);

        return new ProductResource($product);
    }

    /**
     * @param ProductUpdateRequest $request
     * @param string $id
     * @return ProductResource
     */
    public function update(ProductUpdateRequest $request, string $id): ProductResource
    {
        $product = $this->productService->updateProduct($request->validated(), $id);

        event(new ProductUpdated($product));

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return ProductResource
     * @throws Exception
     */
    public function destroy(string $id): ProductResource
    {
        $product = $this->productService->destroyProduct($id);

        event(new ProductDeleted($product));

        return new ProductResource($product);
    }
}
