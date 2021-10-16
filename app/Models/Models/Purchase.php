<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Product;
use App\Models\Models\Category;
use App\Models\Models\Unit;

use App\Models\Supplier;

 

class Purchase extends Model
{
    use HasFactory;

     protected $fillable = [  
        'suplier_id',
        'category_id',
        'product_id',
        'purchase_number',
        'date',
        'description',
        'buying_quantity',
        'unit_price',
        'buying_price',
        'status',
        'created_by',
        'updated_by',
    ];



     public function supplier(){
        return $this->belongsTo(supplier::class,'suplier_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function unit(){
        return $this->belongsTo(unit::class,'unit_id','id');
    }

}
