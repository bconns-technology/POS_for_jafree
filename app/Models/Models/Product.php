<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Unit;
use App\Models\Models\Category;
use App\Models\Supplier;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'suplier_id',
        'category_id',
        'unit_id',
        'created_by',
        'updated_by',
    ];

    public function supplier(){
        return $this->belongsTo(supplier::class,'suplier_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
}
