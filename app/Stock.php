<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'brand_name',
        'product_name',
        'product_code',
        'unit_type',
        'unit_measurement',
        'unit',
        'stock_measurement',
        'purchase_price',
        'selling_price',
        'total_price',
        'store_date',
        'slug'
    ];
    protected $table = 'stocks';
}
