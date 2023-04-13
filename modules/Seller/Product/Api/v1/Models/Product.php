<?php

namespace SolidCrud\Modules\Seller\Product\Api\v1\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'quantity',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', '%'.$search.'%')->get();
    }
}
