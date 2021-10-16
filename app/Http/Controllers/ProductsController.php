<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Unit;
use App\Models\Models\Category;
use App\Models\Models\Product;
use App\Models\Supplier;
use Auth;
 use Illuminate\Support\Facades\DB;     

class ProductsController extends Controller
{
    //For Unit Management
    public function view_unit()
        {
             $data['data'] = unit::all();
            return view('Products/Unit/view-unit', $data);       
        }
    public function add_unit()
        {
             $data['data'] = unit::all();
            return view('Products/Unit/add-unit', $data);
        }
    public function insert_unit(Request $request){
           $data= array();
           $data['name']=$request-> name;  
           $data['created_by']=Auth::user()->id;
        $insert = DB::table('units')->insert($data); 
                return Redirect()->route('view-unit');
       }
    public function delete_unit($id){
          $users = DB::table('units')-> where('id', $id)->DELETE();
         return Redirect()->route('view-unit')->with('success', 'Data Deleted Successfully');
       }
    public function edit_unit($id){
          $data = DB::table('units')-> where('id', $id)->first();
        return view('Products/Unit/update-unit', compact( 'data'));
       }
    public function update_unit(Request $request, $id){
           $data= array();
           $data['name']=$request-> name;
           $data['updated_by']=Auth::user()->id;   
        $insert = DB::table('units')-> where('id', $id)->update($data); 
                return Redirect()->route('view-unit')->with('success', 'Data updated Successfully');
       }
       //Ends of Unit Management

       //For Category Management    
    public function view_category()
        {
             $data['data'] = category::all();
            return view('Products/Category/view-category', $data);       
        }
    public function add_category()
        {
             $data['data'] = category::all();
            return view('Products/Category/add-category', $data);
        }
    public function insert_category(Request $request){
           $data= array();
           $data['name']=$request-> name;  
           $data['created_by']=Auth::user()->id;
        $insert = DB::table('categories')->insert($data); 
                return Redirect()->route('view-category');
       }
    public function delete_category($id){
          $users = DB::table('categories')-> where('id', $id)->DELETE();
         return Redirect()->route('view-category')->with('success', 'Data Deleted Successfully');
       }
    public function edit_category($id){
          $data = DB::table('categories')-> where('id', $id)->first();
        return view('Products/Category/update-category', compact( 'data'));
       }
    public function update_category(Request $request, $id){
           $data= array();
           $data['name']=$request-> name;
           $data['updated_by']=Auth::user()->id;   
        $insert = DB::table('categories')-> where('id', $id)->update($data); 
                return Redirect()->route('view-category')->with('success', 'Data updated Successfully');
       }
       //Ends of category Management

        //For Product Management    
    public function view_product()
        {
             $data['data'] = product::all();
            return view('Products/Product/view-product', $data);       
        }
    public function add_product()
        {
             $data['suppliers'] = supplier::all();
             $data['category'] = category::all();
             $data['units'] = unit::all();
            return view('Products/Product/add-product', $data);
        }
    public function insert_product(Request $request){
           $data= array();
           $data['name']=$request-> name;
           $data['suplier_id']=$request-> suplier_id; 
           $data['category_id']=$request-> category_id;
           $data['unit_id']=$request-> unit_id;
           $data['created_by']=Auth::user()->id;
        $insert = DB::table('products')->insert($data); 
                return Redirect()->route('view-product');
       }
    public function delete_product($id){
          $users = DB::table('products')-> where('id', $id)->DELETE();
         return Redirect()->route('view-product')->with('success', 'Data Deleted Successfully');
       }
    public function edit_product($id){
             $datas['data'] = product::find($id);
             $datas['suppliers'] = supplier::all();
             $datas['categorys'] = category::all();
             $datas['units'] = unit::all();
          // $datas['data'] = DB::table('products')-> where('id', $id)->first();
        return view('Products/Product/update-product', $datas);
       }
    public function update_product(Request $request, $id){
        $data= array();
           $data['name']=$request-> name;
           $data['suplier_id']=$request-> suplier_id; 
           $data['category_id']=$request-> category_id;
           $data['unit_id']=$request-> unit_id;
           $data['updated_by']=Auth::user()->id;   
        $insert = DB::table('products')-> where('id', $id)->update($data); 
                return Redirect()->route('view-product')->with('success', 'Data updated Successfully');
       }
       //Ends of Product Management


}
