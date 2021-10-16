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

class DefaultController extends Controller
{
     public function get_category(Request $request)
        {
             $suplier_id=$request->suplier_id;
             $allCategory = Product::with(['category'])->select('category_id')->where('suplier_id',$suplier_id)->groupBy('category_id')->get();
            return response()->json($allCategory);
        }
    public function get_product(Request $request)
        {
             $category_id=$request->category_id;
             $allProduct = Product::where('category_id',$category_id)->get();
            return response()->json($allProduct);
        }
     public function check_product_stock(Request $request)
        {
             $product_id=$request->product_id;
             $stock = Product::where('id',$product_id)->first()->quantity;
            return response()->json($stock);
        }

       

}


