<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Models\Unit;
use App\Models\Models\Category;
use App\Models\Models\Product;
use App\Models\Models\Purchase;
use Auth;
 use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{   //For Supplier Management 
    public function view_supplier()
        {
             $data['data'] = supplier::all();
            return view('Purchase/view-suppliers', $data);
        }
    public function add_supplier()
        {
             $data['data'] = supplier::all();
            return view('Purchase/add-supplier', $data);
        }
    public function insert_supplier(Request $request){
           $data= array();
           $data['name']=$request-> name;
           $data['email']=$request-> email;
           $data['phone']=$request-> phone;
           $data['address']=$request-> address;  
           $data['created_by']=Auth::user()->id;
        $insert = DB::table('suppliers')->insert($data); 
                return Redirect()->route('view-supplier');
        }
    public function delete_supplier($id){
            $users = DB::table('suppliers')-> where('id', $id)->DELETE();
            return Redirect()->route('view-supplier')->with('success', 'Data Deleted Successfully');
        }
    public function edit_supplier($id){
          $data = DB::table('suppliers')-> where('id', $id)->first();
        return view('Purchase/update-supplier', compact( 'data'));
        }
    public function update_supplier(Request $request, $id){
           $data= array();
            $data['name']=$request-> name;
               $data['email']=$request-> email;
                $data['phone']=$request-> phone;
                 $data['address']=$request-> address; 
                 $data['updated_by']=Auth::user()->id;   
        $insert = DB::table('suppliers')-> where('id', $id)->update($data); 
                return Redirect()->route('view-supplier')->with('success', 'Data updated Successfully');
        }
//End of Supplier Management 

//For Purchase Management    
    public function view_purchase()
        {
             $data['data'] = purchase::orderBy('date','desc')->orderBy('id','desc')->get();
            return view('Purchase/Purchase/view-purchase', $data);       
        }
    public function add_purchase()
        {
             $data['suppliers'] = supplier::all();
             $data['products'] = product::all();
             $data['categorys'] = category::all();
             $data['units'] = unit::all();
            return view('Purchase/Purchase/add-purchase', $data);
        }
    public function insert_purchase(Request $request){
        if($request->category_id== null){
            return redirect()->back()->with('error', 'Sorry! you do not select any item');
        }else{
            $count_category = count($request->category_id);
            for($i=0;$i<$count_category;$i++){
                $purchase = new Purchase();

                $purchase->suplier_id=$request->suplier_id[$i];
                $purchase->category_id=$request->category_id[$i];
                $purchase->product_id=$request->product_id[$i];
                $purchase->purchase_number= $request->purchase_number[$i];
                $purchase->date= date('Y-m-d', strtotime($request->date[$i]));                
                $purchase->description=$request->description[$i];
                $purchase->buying_quantity=$request->buying_quantity[$i];
                $purchase->unit_price=$request->unit_price[$i];
                $purchase->buying_price=$request->buying_price[$i];
                $purchase->status='0';
                $purchase->created_by=Auth::user()->id;
                $purchase->save();
            }
        }
            return Redirect()->route('view-pending');
       }

    public function delete_purchase($id){
          $users = DB::table('purchases')-> where('id', $id)->DELETE();
         return Redirect()->route('view-purchase')->with('success', 'Data Deleted Successfully');
       }
    public function edit_purchase($id){
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

    public function view_pending()
        {
             $data['data'] = purchase::orderBy('date','desc')->orderBy('id','desc')->where('status', '0')->get();
            return view('Purchase/Purchase/view-pending', $data);       
        }

    public function edit_pending($id){
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

       
       
       //Ends of purchase Management

}
