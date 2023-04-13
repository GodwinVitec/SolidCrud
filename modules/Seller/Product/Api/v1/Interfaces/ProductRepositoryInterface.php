<?php

namespace SolidCrud\Modules\Seller\Product\Api\v1\Interfaces;

interface ProductRepositoryInterface {
    public function store($req);
    public function products($req);
    public function product($req);
    public function search($req);
    public function update($req);
    public function delete($req);
}
