@extends('layouts.app')

@section('content')

 <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    		<h1 class="text-center">Add New Purchase</h1>           
    </div>
 <div class="card-body">		
   
   <div class="form-row">

    	
    	<div class="col-4">
    	 <div class="form-group has-success"> 		
					<label for="suplier_id" class="form-label">Supplier Name</label>
					<select name="suplier_id" id="suplier_id" class="form-control select2">
						<option value="">Select Supplier</option>
						@foreach($suppliers as $supplier)
						<option value="{{$supplier->id}}">{{$supplier->name}}</option>
						@endforeach
					</select>
		 </div>
	</div>

			<div class="col-4">
			<div class="form-group has-success">
								<label for="category_id" class="form-label">Purchase Category</label>
								<select name="category_id" id="category_id" class="form-control select2">
									<option value="">Select Category</option>
								</select>
					 </div>
			</div>

<div class="col-4">
		 <div class="form-group has-success">
					<label for="product_id" class="form-label">Products Name</label>
					<select name="product_id" id="product_id" class="form-control select2">
						<option value="">Select Product</option>
					</select>
		 </div>	
</div>
		<div class="col-4">
         <div class="form-group has-success">
					<label for="purchase_number" class="form-label">Purchase Number</label>
					<input type="text" name="purchase_number"id="purchase_number" class="form-control" placeholder="Please Enter Your Purchase Number">
					
		 </div>
		</div>

		<div class="col-4">
		 <div class="form-group has-success">
					<label for="date" class="form-label datepicker">Purchase Date</label>
					<input type="date" name="date" id="date" class="form-control" placeholder="MM-DD-YYYY">
		 </div>
	</div>
	<div class="col-4">
		 <div class="form-group has-success" style="padding-top: 30px;">
		 	<a class="btn btn-primary addeventmore"><i class="fa fa-plus-circle" style="color:white;">Add more</i></a>
					
		 </div>
	</div>
					
	  </div>
   </div>

<div class="card-body">	
	<form method="POST" action="{{route('insert-purchase')}}" class="form-horizontal">
      	@csrf	

      	<table class="table-sm table-bordered table-hover table-dark table-striped align-middle" width="100%">
	    	 <thead >
			   <tr>
					<th class="text-center" style="color:white;">Purchase Category</th>
					<th class="text-center" style="color:white;">Products Name</th>
					<th class="text-center" style="color:white;" width="7%">Pcs/Kg</th>
					<th class="text-center" style="color:white;"width="10%">Unit Price</th>
					<th class="text-center" style="color:white;">Description</th>
					<th class="text-center" style="color:white;" width="10%">Total Price</th>
					<th class="text-center" style="color:white;" >Action</th>
				</tr>
	 		 </thead>

	 		  <tbody id="addRow" class="addRow">
	 		 	
	 		 </tbody>

	 		 <tbody>
	 		 	
			    <tr >
					<td colspan="5"></td>
					<td style="color:yellow;"><input type="text" id="estimated_amount" name="estimated_amount" value="0" class="form-control form-control-sm estimated_amount" readonly style="background-color:#DSFDBA;"></td>
					<td></td>
					
				</tr>
				
	 		 </tbody>

	    </table>   
   
   <br>
   <br> 
   <div class="form-group">
   <button type="submit"  class="btn btn-success" id="store-button"> Add Purchase</button>
   </div>

</div>  

</div>   

<script id="document-template" type="text/x-handlebars-template">

<tr class="delete_add_more_item" id="delete_add_more_item" >
	<input type="hidden" name="purchase_number[]" value="@{{purchase_number}}">
	<input type="hidden" name="date[]" value="@{{date}}">
	<input type="hidden" name="suplier_id[]" value="@{{suplier_id}}">

		<td>
			<input type="hidden" name="category_id[]" value="@{{category_id}}">
			@{{category_name}}
		</td>
		<td>
			<input type="hidden" name="product_id[]" value="@{{product_id}}">
			@{{product_name}}
		</td>
		<td>
			<input type="number" min="1" class="form-control form-control-sm text-right buying_quantity" name="buying_quantity[]" value="1">
		</td>

		<td>
			<input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
		</td>
		<td>
			<input type="text" class="form-control form-control-sm" name="description[]">
		</td>
		<td>
			<input class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly>
		</td>
		<td>
			<i class="btn btn-danger btn-sm fa fa-window-close removeeventmore" ></i>
		</td>
	</tr>
</script>

	

	




<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click",".addeventmore" , function(){
			var date = $('#date').val();
		var purchase_number = $('#purchase_number').val();
		var suplier_id = $('#suplier_id').val();
		var suplier_name = $('#suplier_id').find('option:selected').text();
		var category_id = $('#category_id').val();
		var category_name = $('#category_id').find('option:selected').text();
		var product_id = $('#product_id').val();
		var product_name = $('#product_id').find('option:selected').text();

		if(date==''){
			$.notify("Data is required", {globalPosition:'top-right', className: 'error'});
			return false;
		}
		if(purchase_number==''){
			$.notify("Data is required", {globalPosition:'top-right', className: 'error'});
			return false;
		}
		if(suplier_id==''){
			$.notify("Data is required", {globalPosition:'top-right', className: 'error'});
			return false;
		}
		if(category_id==''){
			$.notify("Data is required", {globalPosition:'top-right', className: 'error'});
			return false;
		}
		if(product_id==''){
			$.notify("Data is required", {globalPosition:'top-right', className: 'error'});
			return false;
		}

		var source=$("#document-template").html();
		var template= Handlebars.compile(source);
		var data = {
					date:date,
					purchase_number:purchase_number,
					suplier_id:suplier_id,
					suplier_name:suplier_name,
					category_id:category_id,
					category_name:category_name,
					product_id:product_id,
					product_name:product_name
			};
		var html =template(data);
		$("#addRow").append(html);

		}); 

		$(document).on("click",".removeeventmore",function(event){
			$(this).closest(".delete_add_more_item").remove();
			totalAmountPrice();
		});

	$(document).on('keyup click', '.unit_price, .buying_quantity',function(){
		var unit_price = $(this).closest("tr").find("input.unit_price").val();
		var qty = $(this).closest("tr").find("input.buying_quantity").val();
		var total =unit_price*qty;
		$(this).closest("tr").find("input.buying_price").val(total);
		totalAmountPrice(); 
	});

	function totalAmountPrice(){
		var sum=0;
		$(".buying_price").each(function(){
			var value=$(this).val();
			if(!isNaN(value) && value.length!=0){
				sum+=parseFloat(value);
			}
		});
		 $('#estimated_amount').val(sum);
		} 

	
	}); 

</script>



<script type="text/javascript">
$(function(){
	$(document).on('change','#suplier_id', function(){
		var suplier_id = $(this).val();
		$.ajax({
			url:"{{route('get-category')}}",
			type:"GET",
			data:{suplier_id:suplier_id},
			success:function(data){
				var html= '<option value="">Select Category</option>';
				$.each(data,function(key,v){
					html += '<option value="'+v.category_id+'">'+v.category.name+'</option>';
				});
				$('#category_id').html(html);
			}
		});
	});
});

</script> 


<script type="text/javascript">
$(function(){
	$(document).on('change','#category_id', function(){
		var category_id = $(this).val();
		$.ajax({
			url:"{{route('get-product')}}",
			type:"GET",
			data:{category_id:category_id},
			success:function(data){
				var html= '<option value="">Select Product</option>';
				$.each(data,function(key,v){
					html += '<option value="'+v.id+'">'+v.name+'</option>';
				});
				$('#product_id').html(html);
			}
		});
	});
});

</script> 


<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $('.date').datepicker(format :'yyyy-mm-dd');        
    });
</script> -->


  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> -->

<!--     <script type="text/javascript">
           $('.datepicker').datepicker({
           	uiLibrary: 'bootstrap 5',
           	format :'yyyy-mm-dd');
        });
    </script> -->


    <script type="text/javascript">
           $(function(){
           	$('.select2').select2();
       
        });
    </script>
          

 @endguest
@endsection


