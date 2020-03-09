<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
      'auth_id',
      'name',
      'email',
      'phone',
      'nid',
      'upload_file',
      'message'
    ];
    protected $table = 'sales';
}
