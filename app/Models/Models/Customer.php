<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
       'created_by',
       'updated_by',
    ];
}
