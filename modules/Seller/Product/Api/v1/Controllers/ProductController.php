<?php

namespace SolidCrud\Modules\Seller\Product\Api\v1\Controllers;

use Illuminate\Http\Request;
use SolidCrud\Modules\BaseController;
use SolidCrud\Modules\Seller\Product\Api\v1\Interfaces\ProductControllerInterface;
use SolidCrud\Modules\Seller\Product\Api\v1\Interfaces\ProductRepositoryInterface;
use SolidCrud\Modules\Seller\Product\Api\v1\Requests\CreateProductRequest;

class ProductController extends BaseController implements ProductControllerInterface
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function store(CreateProductRequest $req)
    {
        $product = $this->productRepository->store($req->validated());

        if(!$product['success'])
        {
            return $this->respondWithError($product['error'], $product['status_code']);
        }

        return $this->respondWithData($product['data']);
    }

    public function products(Request $req)
    {
        return $this->respondWithData($this->productRepository->products($req));
    }

    public function product($id)
    {
        $product = $this->productRepository->product($id);

        if (!$product['success']) {
            return $this->respondWithError($product['error'], $product['status_code']);
        }

        return $this->respondWithData($product['data']);
    }

    public function update(Request $req)
    {
        $product = $this->productRepository->update($req);

        if (!$product['success']) {
            return $this->respondWithError($product['error'], $product['status_code']);
        }

        return $this->respondWithData($product['data']);
    }

    public function search(Request $req)
    {

        $product = $this->productRepository->search($req);

        if (!$product['success']) {
            return $this->respondWithError($product['error'], $product['status_code']);
        }

        return $this->respondWithData($product['data']);

    }

    public function delete($id)
    {
        $product = $this->productRepository->delete($id);

        if (!$product['success']) {
            return $this->respondWithError($product['error'], $product['status_code']);
        }

        return $this->respondWithData($product['data']);
    }

}
