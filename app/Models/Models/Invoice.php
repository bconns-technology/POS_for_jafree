<?php

namespace App\Models\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Payment;
use App\Models\Models\InvoiceDetail;
use App\Models\Models\Category;
class Invoice extends Model
{
    public function payment(){
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }
    public function invoice_details(){
        return $this->hasMany(InvoiceDetail::class,'invoice_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    use HasFactory;
         protected $fillable = [  
         'invoice_number',
         'date',
         'description',
         'status',
         'created_by',
         'approved_by',
    ];
}


