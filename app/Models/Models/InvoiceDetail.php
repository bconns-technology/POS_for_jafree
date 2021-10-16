<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Category;
use App\Models\Models\Product;

class InvoiceDetail extends Model
{


    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
     public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

        protected $fillable = [  
            'invoice_id',
            'category_id',
            'product_id',
            'date',
            'selling_quantity',
            'unit_price',
            'selling_price',
            'status',
        
    ];
}
