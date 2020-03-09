<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOffer extends Model
{
    protected $fillable = [
        'brand_name',
        'product_name',
        'product_code',
        'offer_type',
        'start',
        'end',
        'pieces',
        'offer',
        'slug'
    ];
    protected $table = 'stock_offers';
}
