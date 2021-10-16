@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Supplier/Produc/Category Wise Stock</h1>     
    	<br>
	<div class="text-right">
   		<a title="Download Stock Report" href="{{route('view-stock-report-pdf')}}" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i>Download Stock</a>
   	</div>      
    </div>
 <div class="card-body">	
 <div class="row">
 	<div class="col-sm-12 text-center">
 		<strong>Supplier wise Report</strong>
 		<input type="radio" name="Supplier_product_wise" value="suplier_wise" class="search_value">
 		<strong>Product wise Report</strong>
 		<input type="radio" name="Supplier_product_wise" value="product_wise" class="search_value">
 		<strong>Category wise Report</strong>
 		<input type="radio" name="Supplier_product_wise" value="category_wise" class="search_value">
 	</div>
 </div>	
 <div class="show_suplier" style="display: none;">
 	<form method="GET" action="{{route('view-supplier-wise-stock-report')}}" id="supplierWiseForm" target="_blank">

 <div class="form-row">
 	<div class="col-sm-8">
 	<label>Supplier Name</label> 
 	<select name="suplier_id" class="form-control select2">
 		<option value="">Select Supplier</option>
 		@foreach($data as $suplier)
 		<option value="{{$suplier->id}}">{{$suplier->name}}</option>
 		@endforeach
 	</select>
 </div>
 	<div class="col-sm-4" style="padding-top: 29px;">
 		<button type="submit" class="btn btn-primary btn-sm">Search</button>
 	</div>
 </div>

 </form>

 </div>

  <div class="show_product" style="display: none;">
 	<form method="GET" action="{{route('view-product-wise-stock-report')}}" id="productWiseForm" target="_blank">

 <div class="form-row">
 	<div class="col-sm-8">
 	<label>Product Name</label> 
 	<select name="product_id" class="form-control select2">
 		<option value="">Select Product</option>
 		@foreach($product as $p)
 		<option value="{{$p->id}}">{{$p->name}}</option>
 		@endforeach
 	</select>
 </div>
 	<div class="col-sm-4" style="padding-top: 29px;">
 		<button type="submit" class="btn btn-primary btn-sm">Search</button>
 	</div>
 </div>

 </form>

 </div>

 <div class="show_category" style="display: none;">
 	<form method="GET" action="{{route('view-category-wise-stock-report')}}" id="categoryWiseForm" target="_blank">

 <div class="form-row">
 	<div class="col-sm-8">
 	<label>category Name</label> 
 	<select name="category_id" class="form-control select2">
 		<option value="">Select category</option>
 		@foreach($category as $cat)
 		<option value="{{$cat->id}}">{{$cat->name}}</option>
 		@endforeach
 	</select>
 </div>
 	<div class="col-sm-4" style="padding-top: 29px;">
 		<button type="submit" class="btn btn-primary btn-sm">Search</button>
 	</div>
 </div>

 </form>

 </div>

   	
   	


   </div>
</div>
<!-- </div>
 -->

 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#supplierWiseForm').validate({
 		ignore:[],
 		errorPlacement: function(error, element){
 			if (element.attr("name")=="suplier_id"){
 				error.insertAfter(element.next());
 			}
 			else{
 				error.insertAfter(element);
 			}
 		},
 		errorClass:'text-danger',
 		validClass:'text-success',
 		rules:{
 			suplier_id:{
 				required:true,
 			}
 		},
 		message:{

 			}, 
 		});

 	});
 </script>

 <script type="text/javascript">

	$(document).on('change','.search_value', function(){
		var search_value = $(this).val();
		if (search_value=='suplier_wise') {
			$('.show_suplier').show();
		}
		
		else if (search_value=='product_wise') {
			$('.show_product').show();
		}
		else if(search_value=='category_wise'){
			$('.show_category').show();
		}
		else{
			$('.show_suplier').hide();
			$('.show_product').hide();
			$('.show_category').hide();
		}


	});
</script> 
 @endguest

@endsection