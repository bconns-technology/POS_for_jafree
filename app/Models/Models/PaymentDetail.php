<?php

namespace App\Models\Models;
use App\Models\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;




    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    

      protected $fillable = [  

        'invoice_id',
        'curent_paid_amount',
        'date',
        'updated_by',
        
    ];



}
