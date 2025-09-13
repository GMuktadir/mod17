<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // protected $table = 'customers'; //also allowed
    protected $fillable = ['name'];
}
