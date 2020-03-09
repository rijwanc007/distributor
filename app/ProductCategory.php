<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    protected $fillable=[
        'product_brand',
        'product_code',
        'product_name',
        'unit_type',
        'unit_measurement',
        'unit',
        'purchase_price',
        'selling_price',
        'product_status',
    ];
    protected $table = 'product_categories';
}
