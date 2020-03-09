<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable = [
      'sale_id',
      'brand_name',
      'product_code',
      'product_name',
      'selling_rates',
      'sales_qty',
      'offer_type',
      'total_offer',
    ];
    protected $table = 'sale_invoices';
}
