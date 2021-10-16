<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Category;
use App\Models\Models\Customer;
use App\Models\Models\Invoice;
use App\Models\Models\InvoiceDetail;
use App\Models\Models\Payment;
use App\Models\Models\PaymentDetail;
use App\Models\Models\Product;
use App\Models\Models\Purchase;
use App\Models\Supplier;
use App\Models\Models\Unit;

use Auth;
use PDF;
 use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function  view_daily_invoice_report()
        {
          $data['data']=invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
            return view('Report/view-daily-invoice-report', $data);       
        }  


        public function  view_daily_invoice_report_pdf(Request $request)
        {
            $sdate=$request->start_date;
            $edate=$request->end_date;
           
          $data['allData']=invoice::whereBetween('date', [$sdate,$edate])->where('status','1')->get();

        // $data['end_date'] = date('Y-m-d', strtotime($request->end_date));
            $pdf = PDF::loadView('Report/print-search-invoice-pdf',$data);
         
          return $pdf->stream('print-search-invoice-pdf.pdf');          
        } 

        
          public function  view_p_s_c_wise_stock()
        {
             $data['data'] = Supplier::all();
             $data['product'] = product::all();
             $data['category'] = category::all();
            return view('Report/view_p_s_c_wise_stock', $data);       
        }  


        public function  view_p_s_c_wise_stock_pdf(Request $request)
        {
           $data['data'] = Product::orderBy('suplier_id', 'asc')->orderBy('category_id','asc')->where('suplier_id', $request->suplier_id)->get(); 
           $data['suppliers']=supplier::where('id', $request->suplier_id)->first();
            $pdf = PDF::loadView('Report/view_suplier_wise_stock', $data);
    
        return $pdf->stream('view_suplier_wise_stock');

        }  

        public function  view_product_wise_stock(Request $request)
        {
           
           $data['product'] = Product::orderBy('suplier_id', 'asc')->orderBy('category_id','asc')->where('id', $request->product_id)->get(); 
            $pdf = PDF::loadView('Report/view_product_wise_stock', $data);
          return $pdf->stream('view_product_wise_stock');
        }  

        public function  view_category_wise_stock(Request $request)
        {
           
           $data['category'] = Product::orderBy('category_id','asc')->where('category_id', $request->category_id)->get(); 
             $data['categorys']=Category::where('id', $request->category_id)->first();

            $pdf = PDF::loadView('Report/view_category_wise_stock', $data);
          return $pdf->stream('view_category_wise_stock');
        }  


        public function  view_daily_purchase_report()
        {
          $data['data']=purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
            return view('Report/view-daily-purchase-report', $data);       
        }  


        public function  view_daily_purchase_report_pdf(Request $request)
        {
            $sdate=$request->start_date;
            $edate=$request->end_date;
           
          $data['allData']=Purchase::whereBetween('date', [$sdate,$edate])->where('status','1')->get();

        // $data['end_date'] = date('Y-m-d', strtotime($request->end_date));
            $pdf = PDF::loadView('Report/print-search-purchase-pdf',$data);
         
          return $pdf->stream('print-search-purchase-pdf.pdf');          
        } 


         public function  view_customer_report()
        
        {
         $data['data'] = Payment::whereIn('paid_status',['full_due', 'partial_paid'])->get();
            return view('Report/view-customer-report', $data);       
        }  


        public function  view_customer_credit_report(Request $request)
        {
            $data['allData'] = Payment::whereIn('paid_status',['full_due', 'partial_paid'])->get();
            $pdf = PDF::loadView('Report/view_customer_credit_report', $data);
    
        return $pdf->stream('view_customer_credit_report');

        }  
 





}
