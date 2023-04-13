<?php

namespace SolidCrud\Modules\Seller\Product\Api\v1\Interfaces;

use Illuminate\Http\Request;
use SolidCrud\Modules\Seller\Product\Api\v1\Requests\CreateProductRequest;

interface ProductControllerInterface {
    public function store(CreateProductRequest $req);
    public function products(Request $req);
    public function product(Request $req);
    public function update(Request $req);
    public function search(Request $req);
    public function delete($id);
}
