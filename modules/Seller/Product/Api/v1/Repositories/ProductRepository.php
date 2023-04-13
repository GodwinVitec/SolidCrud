<?php

namespace SolidCrud\Modules\Seller\Product\Api\v1\Repositories;

use Illuminate\Http\Request;
use SolidCrud\Modules\BaseRepository;
use SolidCrud\Modules\Seller\Product\Api\v1\Models\Product;
use SolidCrud\Modules\Seller\Product\Api\v1\Interfaces\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface {

    private $generalResponseMessage;
    private $generalErrorMessage;
    private $notFoundErrorMessage;
    private $productUpdateSuccessMessage;
    protected $model;

    public function __construct()
    {
        $this->model = app(Product::class);
        $this->generalResponseMessage = config('constants.messages.products.general');
        $this->productUpdateSuccessMessage = config('constants.messages.products.update_success');
        $this->generalErrorMessage = config('constants.errors.general');
    }

    public function store($req)
    {
        try {
            return $this->successResponse(
                $this->model->create($req),
                config('constants.messages.products.creation_success')
            );
        } catch (\Exception $why)
        {
            return $this->failResponse($why->getMessage());
        }

    }

    public function products($req)
    {
        return $this->model->all();

    }

    public function product($id)
    {
        $product = $this->model->findOrFail($id);
        if(!$product)
        {
            return $this->failResponse($this->notFoundErrorMessage, 404);
        }
        return $this->successResponse(
            $product,
            $this->generalResponseMessage,
        );


    }

    public function update($req)
    {
        try {
            $product = $this->model->findOrFail($req->id);
            $product->update($req->except(['id']));

            return $this->successResponse(
                $product->fresh(),
                $this->productUpdateSuccessMessage,
            );
        } catch (\Exception $why) {
            return $this->failResponse($why->getMessage());
        }

    }

    public function search($req)
    {

        if(empty($req['q']))
        {
            return $this->failResponse(config('constants.errors.products.search_param_missing'), 422);
        }

        return $this->successResponse(
            $this->model->search($req['q']),
            $this->generalResponseMessage,
        );

    }

    public function delete($id)
    {
        try {
            return $this->model->findOrFail($id)->delete() == 1 ?  $this->successResponse(
                null,
                $this->generalResponseMessage,
            ) :
            $this->failResponse($this->generalErrorMessage);
        } catch (\Exception $why) {
            return $this->failResponse($why->getMessage());
        }

    }
}
