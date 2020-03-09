<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
   protected $fillable = [
     'tax_title',
     'tax_value',
     'tax_status',
   ];
   protected $table = 'taxes';
}
