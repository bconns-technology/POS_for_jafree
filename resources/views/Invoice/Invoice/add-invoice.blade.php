@extends('layouts.app')

@section('content')

 <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    		<h1 class="text-center">Add New Invoice</h1>           
    </div>
 <div class="card-body">		
   
   <div class="form-row">

		<div class="col-2">
         <div class="form-group has-success">
					<label for="invoice_number" class="form-label">Invoice Number</label>
					<input type="text" name="invoice_number"id="invoice_number" class="form-control form-control-sm" value="{{$invoice_number}}" readonly style="background-color:#DSFDBA;"
					>
					
		 </div>
		</div>
    	
 

			<div class="col-4">
			<div class="form-group has-success">
								<label for="category_id" class="form-label">Category</label>
								<select name="category_id" id="category_id" class="form-control select2 form-control-sm">
									<option value="">Select Category</option>
									@foreach($categorys as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
					 </div>
			</div>

			<div class="col-4">
			 <div class="form-group has-success">
					<label for="product_id" class="form-label">Products Name</label>
					<select name="product_id" id="product_id" class="form-control select2 form-control-sm">
						<option value="">Select Product</option>
					</select>
			 </div>	
			</div>

			<div class="col-2">
         <div class="form-group has-success">
					<label for="invoice_number" class="form-label">Stock(Pcs/Kg))</label>
					<input type="text" name="current_stock_quantity" id="current_stock_quantity" class="form-control form-control-sm" readonly style="background-color:#DSFDBA;"
					>
					
		 </div>
		</div>

	

		<div class="col-4">
		 <div class="form-group has-success">
					<label for="date" class="form-label datepicker">Sales Date</label>
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
	<form method="POST" action="{{route('insert-invoice')}}" class="form-horizontal">
      	@csrf	

      	<table class="table-sm table-bordered table-hover table-dark table-striped align-middle" width="100%">
	    	 <thead >
			   <tr>
					<th class="text-center" style="color:white;">Product Category</th>
					<th class="text-center" style="color:white;">Products Name</th>
					<th class="text-center" style="color:white;" width="7%">Pcs/Kg</th>
					<th class="text-center" style="color:white;"width="10%">Unit Price</th>
					<th class="text-center" style="color:white;" width="10%">Total Price</th>
					<th class="text-center" style="color:white;" >Action</th>
				</tr>
	 		 </thead>

	 		  <tbody id="addRow" class="addRow">
	 		 	
	 		 </tbody>

	 		 <tbody>
	 		 	<tr >
					<td colspan="4" class="text-right">Discount</td>
					<td style="color:yellow;"><input type="text" id="discount_amount" name="discount_amount" class="form-control form-control-sm discount_amount" placeholder="Enter Discount Amount"></td>	
				</tr>
	 		 	
			    <tr >
					<td colspan="4" class="text-right">Grand Total</td>
					<td style="color:yellow;">
						<input type="text" id="estimated_amount" name="estimated_amount" value="0" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color:#DSFDBA;"></td>
					<td></td>
					
				</tr>
				
	 		 </tbody>

	    </table>  
<br>
	     <div class="form-row">
	     	<div class="form-group col-md-12">
	     		<input type="text" name="description"   placeholder= "Write Description here" class="form-control" id="description">
				</div>
			 </div>
 		<div class="form-row">
	     	<div class="form-group col-md-4">
	     		<label>Paid Status</label>
	     		<select name="paid_status" id="paid_status" class="form-control form-control-sm">
	     			<option value=""> Select Status</option>
	     			<option value="full_paid">Full Paid</option>
	     			<option value="full_due">Full Due</option>
	     			<option value="partial_paid">Partial Paid</option>
	     		</select>
	     		<input type="text" name="paid_amount"   placeholder= "Enter Paid Amount here" class="form-control form-control-sm paid_amount" id="paid_amount" style="display: none;">
				</div>

			<div class="form-group col-md-8">
	     		<label>Customer Name</label>
	     		<select name="customer_id" id="customer_id" class="form-control form-control-sm select2 customer_id">
	     			<option value=""> Select Customer</option>

	     			@foreach($customers as $cust)
	     			<option value="{{$cust->id}}">{{$cust->name}}  ({{$cust->phone}}-{{$cust->address}}) </option>
	     			@endforeach
	     			<option value="0">New Customer</option>
	     			
	     		</select>
	     		
				</div>

	
			 </div>

		<div class="form-group new_customer" name="new_customer" id="new_customer" style="display: none;">
		
			<div class="form-group col-md-4">
				<input type="text" name="name" id="name" placeholder= "Write Customer Name" class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-4">
				<input type="text" name="phone" id="phone" placeholder= "Write Customer phone" class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-4">
				<input type="text" name="address" id="address" placeholder= "Write Customer address" class="form-control form-control-sm">
			</div>
		</div>

   
   
   <br> 
   <div class="form-group">
   <button type="submit"  class="btn btn-success" id="store-button"> Add Invoice</button>
   </div>

</form>  

</div>   

<script id="document-template" type="text/x-handlebars-template">

<tr class="delete_add_more_item" id="delete_add_more_item" >

	<input type="hidden" name="invoice_number" value="@{{invoice_number}}">
	<input type="hidden" name="date" value="@{{date}}">
	
		<td>
			<input type="hidden" name="category_id[]" value="@{{category_id}}">
			@{{category_name}}
		</td>
		<td>
			<input type="hidden" name="product_id[]" value="@{{product_id}}">
			@{{product_name}}
		</td>
		<td>
			<input type="number" min="1" class="form-control form-control-sm text-right selling_quantity" name="selling_quantity[]" value="1">
		</td>

		<td>
			<input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
		</td>
		
		<td>
			<input class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly>
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
		var invoice_number = $('#invoice_number').val();
		var category_id = $('#category_id').val();
		var category_name = $('#category_id').find('option:selected').text();
		var product_id = $('#product_id').val();
		var product_name = $('#product_id').find('option:selected').text();

		if(date==''){
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
					invoice_number:invoice_number,
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

	$(document).on('keyup click', '.unit_price, .selling_quantity',function(){
		var unit_price = $(this).closest("tr").find("input.unit_price").val();
		var qty = $(this).closest("tr").find("input.selling_quantity").val();
		var total =unit_price*qty;
		$(this).closest("tr").find("input.selling_price").val(total);
		$('#discount_amount').trigger('keyup');
	});
	$(document).on('keyup click', '#discount_amount',function(){
		totalAmountPrice(); 
	});

	function totalAmountPrice(){
		var sum=0;
		$(".selling_price").each(function(){
			var value=$(this).val();
			if(!isNaN(value) && value.length!=0){
				sum+=parseFloat(value);
			}
		});

		var discount_amount=parseFloat($('#discount_amount').val());
			if(!isNaN(discount_amount) && discount_amount.length!=0){
				sum-=parseFloat(discount_amount);
			}
		 $('#estimated_amount').val(sum);
		} 

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

<script type="text/javascript">
$(function(){
	$(document).on('change','#product_id', function(){
		var product_id = $(this).val();
		$.ajax({
			url:"{{route('check-product-stock')}}",
			type:"GET",
			data:{product_id:product_id},
			success:function(data){
				$('#current_stock_quantity').val(data);
			}
		});
	});
});

</script> 

<script type="text/javascript">

	$(document).on('change','#paid_status', function(){
		var paid_status = $(this).val();
		if (paid_status=='partial_paid') {
			$('.paid_amount').show();
		}
		else{
			$('.paid_amount').hide();
		}
	});

	$(document).on('change','#customer_id', function(){
		var customer_id = $(this).val();
		if (customer_id=='0') {
			$('.new_customer').show();
		}
		else{
			$('.new_customer').hide();
		}
	});

</script> 

<!-- <script type="text/javascript">

	$(document).on('change','#customer_id', function(){
		var customer_id = $(this).val();
		if (customer_id=='0') {
			$('.new_customer').show();
		}
		else{
			$('.new_customer').hide();
		}
	});
</script>  -->




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


