<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Unit;
use App\Models\Models\Category;
use App\Models\Models\Product;
use App\Models\Supplier;
use App\Models\Models\Customer;
use App\Models\Models\Payment;
use App\Models\Models\PaymentDetail;
use App\Models\Models\Invoice;
use App\Models\Models\InvoiceDetail;
use Auth;
 use Illuminate\Support\Facades\DB;   



class CustomerController extends Controller
{
     public function view_customer()
    {
         $data['data'] = customer::all();
        return view('Customer/view-customer', $data);
    }

     public function add_customer()
    {
         $data['data'] = customer::all();
        return view('Customer/add-customer', $data);
    }


    public function insert_customer(Request $request){

           $data= array();
           $data['name']=$request-> name;
           $data['email']=$request-> email;
           $data['phone']=$request-> phone;
           $data['address']=$request-> address;  
           $data['created_by']=Auth::user()->id;


        $insert = DB::table('customers')->insert($data); 
                return Redirect()->route('view-customer');

}


public function delete_customer($id){
      $users = DB::table('customers')-> where('id', $id)->DELETE();
     return Redirect()->route('view-customer')->with('success', 'Data Deleted Successfully');;

}

public function edit_customer($id){
      $data = DB::table('customers')-> where('id', $id)->first();
     // $contacts= DB::table['minds']->get();
    return view('Customer/update-customer', compact( 'data'));

}


public function update_customer(Request $request, $id){


   $data= array();

    $data['name']=$request-> name;
       $data['email']=$request-> email;
        $data['phone']=$request-> phone;
         $data['address']=$request-> address; 
         $data['updated_by']=Auth::user()->id;   

$insert = DB::table('customers')-> where('id', $id)->update($data); 
        return Redirect()->route('view-customer')->with('success', 'Data updated Successfully');
  
    /*echo "<pre>";
         print_r($data);$mine = new mine();*/

  

}
public function edit_customer_credit_invoice($invoice_id){
      $payment = Payment::where('invoice_id', $invoice_id)->first();
     // $contacts= DB::table['minds']->get();
    return view('Customer/edit_customer_credit_invoice', compact( 'payment'));

}

public function update_customer_credit_invoice(Request $request, $invoice_id){
    if ($request->new_paid_amount<$request->paid_amount) {
        return redirect()->back()->with('error', 'Sorry! you have paid maximum value');
        // code...
    }
    else{
        $payment= Payment::where('invoice_id', $invoice_id)->first();
        $payment_details = new PaymentDetail();
        $payment->paid_status = $request->paid_status;
        if ($request->paid_status=='full_paid') {
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
            $payment->due_amount='0';
            $payment_details->curent_paid_amount = $request->new_paid_amount;
        }
        elseif($request->paid_status == 'partial_paid'){
            $payment->paid_amount=Payment::where('invoice_id', $invoice_id)->first()['paid_amount']+$request->paid_amount;
            $payment->due_amount=Payment::where('invoice_id', $invoice_id)->first()['due_amount']-$request->paid_amount;
            $payment_details->curent_paid_amount= $request->paid_amount;
        }
        $payment->save();
        $payment_details->invoice_id = $invoice_id;
        $payment_details->created_by = Auth::user()->id;
        $payment_details->save();
        return redirect()->route('view-customer-credit-report');
    }

   

}



}
