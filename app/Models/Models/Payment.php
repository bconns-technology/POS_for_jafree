<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Customer;
use App\Models\Models\Invoice;

class Payment extends Model
{

 public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id','id');
    }

  public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }


    use HasFactory;

      protected $fillable = [  

        'invoice_id',
        'customer_id',
        'paid_status',
        'total_amount',
        'discount_amount',
        'paid_amount',
        'due_amount',
        
    ];


}
