<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Models\Unit;
use App\Models\Models\Category;
use App\Models\Models\Product;
use App\Models\Models\Purchase;
use App\Models\Models\Invoice;
use App\Models\Models\InvoiceDetail;
use App\Models\Models\Payment;
use App\Models\Models\PaymentDetail;
use App\Models\Models\Customer;
use Auth;
use \PDF;
 use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    
//For Invoice Management    
    public function view_invoice()
        {
             $data['data'] = invoice::orderBy('date','desc')->orderBy('id','desc')->where('status', '1')->get();
            return view('Invoice/Invoice/view-invoice', $data);       
        }
 
         public function add_invoice()
        {
          
             $data['categorys'] = category::all();
             $invoice_data =Invoice::orderBy('id','desc')->first();
             if ($invoice_data == null) {
                $firstReg='0';
                $data['invoice_number']=$firstReg+1;
             }
             else{
                $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_number;
                 $data['invoice_number']=$invoice_data+1;
             }
              $data['customers'] = Customer::all();
            return view('Invoice/Invoice/add-invoice', $data);
        }

    public function insert_invoice(Request $request){
         if($request->category_id== null){
            return redirect()->back()->with('error', 'Sorry! you do not select any item');
        }else{
            if($request->paid_amount>$request->estimated_amount){
                return redirect()->back()->with('error', 'Sorry! Paid amount is greater than Total amount');
            }
            else{
                $invoice = new Invoice();
                $invoice->invoice_number = $request->invoice_number;
                $invoice->date = date('Y-m-d', strtotime($request->date));  
                $invoice->description = $request->description;
                $invoice->status = '0';  
                $invoice->created_by = Auth::user()->id;
                DB::transaction(function() use($request,$invoice){
                    if($invoice->save()){
                         $count_category = count($request->category_id);
                         for($i=0;$i<$count_category;$i++){
                            $invoice_details = new InvoiceDetail();
                            $invoice_details->invoice_id=$invoice->id;                            
                            $invoice_details->category_id=$request->category_id[$i];
                            $invoice_details->product_id=$request->product_id[$i];
                            $invoice_details->date=date('Y-m-d', strtotime($request->date)); 
                            $invoice_details->selling_quantity=$request->selling_quantity[$i];
                            $invoice_details->unit_price=$request->unit_price[$i];
                            $invoice_details->selling_price=$request->selling_price[$i];
                            $invoice_details->status='1'; 
                            $invoice_details->save();                          
                    }
                    if ($request->customer_id=='0') {
                        $customer=new Customer();
                        $customer->name=$request->name;
                        $customer->phone=$request->phone;
                        $customer->address=$request->address;
                        $customer->save(); 
                        $customer_id=$customer->id;
                    }
                    else{
                        $customer_id=$request->customer_id;
                    }
                    $payment = new Payment();
                    $payment_details= new PaymentDetail();
                    $payment->invoice_id= $invoice->id;
                    $payment->customer_id= $customer_id;
                    $payment->paid_status= $request->paid_status;
                    $payment->total_amount= $request->estimated_amount; 
                    $payment->discount_amount= $request->discount_amount;
                    if ($request->paid_status=='full_paid') {
                        $payment->paid_amount=$request->estimated_amount;
                        $payment->due_amount='0';
                        $payment_details->curent_paid_amount=$request->estimated_amount;
                      }  
                      elseif ($request->paid_status=='full_due') {
                         $payment->paid_amount='0';
                        $payment->due_amount=$request->estimated_amount;
                        $payment_details->curent_paid_amount='0';
                      }
                        elseif ($request->paid_status=='partial_paid') {
                         $payment->paid_amount=$request->paid_amount;
                        $payment->due_amount=$request->estimated_amount-$request->paid_amount;
                        $payment_details->curent_paid_amount=$request->paid_amount;
                      }
                      $payment->save();
                      $payment_details->invoice_id=$invoice->id;
                      $payment_details->date=date('Y-m-d', strtotime($request->date)); 
                      $payment_details->save();
                  }
                

    });

            }
        }

            return Redirect()->route('view-invoice');
       }

    public function view_invoice_pending()
        {
             $data['data'] = invoice::orderBy('date','desc')->orderBy('id','desc')->where('status', '0')->get();
            return view('Invoice/Invoice/view-invoice-pending', $data);       
        }

    public function delete_invoice($id){

        $invoice = Invoice::find($id);
        $invoice->delete();
        InvoiceDetail::where('invoice_id',$invoice->id)->delete();
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetail:: where('invoice_id',$invoice->id)->delete();
          $users = DB::table('purchases')-> where('id', $id)->DELETE();
         return Redirect()->route('view-invoice-pending')->with('success', 'Data Deleted Successfully');
       }


    public function edit_invoice_pending($id){
             $invoice = invoice::with(['invoice_details'])->find($id);
             return view('Invoice/Invoice/approve_invoice',compact('invoice'));
             
       }


    public function  approve_invoice_pending(Request $request, $id){
         foreach($request->selling_quantity as $key => $val){
            $invoice_details = InvoiceDetail::where('id', $key)->first();
            $product = Product::where('id', $invoice_details->product_id)->first();
            if ($product->quantity< $request->selling_quantity[$key] ){
                return redirect()->back()->with('error', 'Sorry! you approve maximum value');
            }
            
        }
                $invoice = Invoice::find($id);
                $invoice->approved_by= Auth::user()->id;
                $invoice->status = '1';  
                DB::transaction(function() use($request,$invoice, $id){
                    foreach($request->selling_quantity as $key => $val){
                            $invoice_details =InvoiceDetail::where('id', $key)->first();
                            $product = Product::where('id', $invoice_details->product_id)->first();
                            $product->quantity= ((float)$product->quantity)+((float)$request->selling_quantity[$key]);
                            $product->save();
                            }
                            $invoice->save();   
                            });
            return Redirect()->route('view-invoice-pending')->with('success', 'Invoice Successfully Approved');
       }


    public function print_invoice()
        {
          $data['data']=invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
            return view('Invoice/Invoice/print-invoice', $data);       
        }  

 function  print_invoice_pdf($id)
        {
             $invoice = invoice::with(['invoice_details'])->find($id);
            // return view('Invoice/Invoice/approve_invoice',compact('invoice'));
         // $data['data']=invoice::with(['invoice_details'])->find($id);
          $pdf = PDF::loadView('Invoice/Invoice/print-invoice-pdf',compact('invoice'));
         
          return $pdf->stream('document.pdf');
            return view('Invoice/Invoice/print-invoice-pdf', compact('invoice'));       
        }  


      
        public function  view_daily_invoice_report()
        {
          $data['data']=invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
            return view('Report/view-daily-invoice-report', $data);       
        }  


        public function  view_daily_invoice_report_pdf(Request $request)
        {
          $sdate =date('Y-m-d', strtotime($request->start_date));
           $edate =date('Y-m-d', strtotime($request->end_date));
          $data['allData']=invoice::whereBetween('date', [$sdate,$edate])->where('status','1')->get();
         $data['end_date'] = date('Y-m-d', strtotime($request->end_date));
            $pdf = PDF::loadView('Report/print-search-invoice-pdf',$data);
         
          return $pdf->stream('document.pdf');      
            return view('Report/print-search-invoice-pdf',$data);    
        }  


       public function  view_stock_report()
        {
             $data['data'] = product::orderBy('suplier_id', 'asc')->orderBy('category_id','asc')->get();
            return view('Report/view_stock_report', $data);       
        }  


        public function  view_stock_report_pdf(Request $request)
        {
           $data['data'] = product::orderBy('suplier_id', 'asc')->orderBy('category_id','asc')->get();

        $pdf = PDF::loadView('Report/view_stock_report-pdf', $data);
    
        return $pdf->stream('view_stock_report-pdf.pdf');


        }  
       

       

        /*public function index()
    { $pdf->SetProtection(['copy','print'], '', 'pass');
        $data = [
            'title' => 'Welcome to Tutsmake.com',
            'date' => date('m/d/Y')
        ];
           
        $pdf = PDF::loadView('testPDF', $data);
     
        return $pdf->download('tutsmake.pdf');
    }  */

         

       
       
       //Ends of Invoice Management
}



   /* public function edit_purchase($id){
             $datas['data'] = purchase::find($id);
             $datas['suppliers'] = supplier::all();
             $datas['categorys'] = category::all();
             $datas['units'] = unit::all();
          // $datas['data'] = DB::table('purchases')-> where('id', $id)->first();
        return view('Purchase/Purchase/update-purchase', $datas);
       }
    public function update_purchase(Request $request, $id){
        $data= array();
           $data['name']=$request-> name;
           $data['suplier_id']=$request-> suplier_id; 
           $data['category_id']=$request-> category_id;
           $data['unit_id']=$request-> unit_id;
           $data['updated_by']=Auth::user()->id;   
        $insert = DB::table('purchases')-> where('id', $id)->update($data); 
                return Redirect()->route('view-purchase')->with('success', 'Data updated Successfully');
       }


        public function edit_invoice_pending($id){
             $purchase = purchase::find($id);
             $product = Product::where('id',$purchase->product_id)->first();
             $purchase_quantity =((float)($purchase->buying_quantity))+ ((float)($product->quantity));
             $product->quantity=$purchase_quantity;
             if($product->save()){
                DB::table('purchases')
                    ->where('id',$id)
                    ->update(['status'=>1]);
             }
          // $datas['data'] = DB::table('purchases')-> where('id', $id)->first();
        return Redirect()->route('view-pending')->with('success', 'Data updated Successfully');
       }
*/