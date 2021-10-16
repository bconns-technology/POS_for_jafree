@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS public/bootstrap-5.1.3-dist/css/bootstrap.min.css-->
    <link href="{{asset('public/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <title>Daily Invoice Report</title>
  </head>
  <body>
  	<div class="container-sm">
  		<h1 style="text-align: center;" >JAFREE MACHINERY & TOOLS</h1>
  		<hr style="width: 70%;">
  		<div class="row">
			<p>226, Nobabpur Road, Near Manoshi Complex</p>
			<p>		Web: www.jafreemachinery.com </p>
			<p>Call- 01711-349098</p>
  		</div>
  <div class="card">
    <div class="card-title">
    	<h1 class="text-center">Edit Invoice</h1>
    	<a href="" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> Edit Invoice</a>           
    </div>
 <div class="card-body">
 	<hr style="margin-bottom: 0px;">

  	


  		<div class="row">
  			<div class="col-md-12">
  					
	
  
 
   	<table width="100%">
   		<tbody>
   			<tr >
   				<td  class="text-left" width="10%"> Customer Info</td>
				<td class="text-left" width="30%" >Name: {{$payment['customer']['name']}}</td>				
   				<td class="text-left"  width="30%" >Mobile Number: {{$payment['customer']['phone']}}</td>
				<td class="text-left" width="28%">Address: {{$payment['customer']['address']}} </td>
			</tr>

			<br>
			<br>
			<br>
			<tr>
<td></td>
			
   		</tbody>	

   	</table>


  			</div>

  		</div>

  		<div class="row">
  			<div class="col-md-12">
	   <form  method="POST" class="form-horizontal" action="
	   {{URL::to('update-customer-credit-invoice/'. $payment->invoice_id)}}" >
      	@csrf	
	    <table border="3" width="80%" class="table table-hover  table-dark table-striped align-middle">
	    	 <thead >
			   <tr>
					<th class="text-center" style="color:white;">Id</th>
					<th class="text-center" style="color:white;">Category</th>
					<th class="text-center" style="color:white;" >Product Name</th>
					<th class="text-center" style="color:white;">Current Stock</th>
					<th class="text-center" style="color:white;" >Quantity</th>
					<th class="text-center" style="color:white;" >Unit Price</th>
					<th class="text-center" style="color:white;" >Total Price</th>
				</tr>
	 		 </thead>
	 		 <tbody>

	 		 	@php
	 		 	$total_sum= '0';
	 		 	$details = App\Models\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
	 		 	@endphp

	 		 	@foreach($details as $key=> $d)
			    <tr class="text-center" >
			    	<input type="hidden" name="category_id[]" value="{{$d->category_id}}">
			    	<input type="hidden" name="product_id[]" value="{{$d->product_id}}">
			    	<input type="hidden" name="selling_quantity[{{$d->id}}]" value="{{$d->selling_quantity}}">
					<td style="color:yellow;">{{$key+1}}</td>
					<td style="color:yellow;">{{$d['category']['name']}}</td>
					<td style="color:yellow;">{{$d['product']['name']}}</td>
					<td style="color:yellow;">	{{$d['product']['quantity']}}</td>
					<td style="color:yellow;"> {{$d->selling_quantity}}</td>
					<td style="color:yellow;">{{$d->unit_price}}</td>
					<td style="color:yellow;" class="text-center">{{$d->selling_price}}</td>
					
				</tr>
				@php
	 		 	$total_sum+=$d->selling_price;
	 		 	@endphp
				@endforeach
				<tr>
					<td colspan="6"  style="color:white;"> <strong>Sub Total</strong></td>
					<td class="text-center" style="color:yellow;"> {{$total_sum}}</td>
				</tr>
				<tr>
					<td colspan="6"  style="color:white;"> Discount</td>
					<td class="text-center" style="color:yellow;"> {{$payment->discount_amount}}</td>
				</tr>
				<tr>
					<td colspan="6"  style="color:white;"> Paid Amount</td>
					<td class="text-center" style="color:yellow;"> {{$payment->paid_amount}}</td>
				</tr>
	 		 <tr>
					<td colspan="6" style="color:white;" > Due Amount</td>
					<input type="hidden" name="new_paid_amount" value=" {{$payment->due_amount}}">
					<td class="text-center" style="color:yellow;"> {{$payment->due_amount}}</td>
				</tr>

				<tr>
					<td colspan="6" style="color:white;" ><strong> Grand Total</strong></td>
					<td class="text-center" style="color:yellow;"> {{$payment->total_amount}}</td>
				</tr>
	 		 </tbody>

	    </table>

	    	<div class="form-group col-md-4">
	     		<label>Paid Status</label>
	     		<select name="paid_status" id="paid_status" class="form-control form-control-sm">
	     			<option value=""> Select Status</option>
	     			<option value="full_paid">Full Paid</option>
	     			<option value="partial_paid">Partial Paid</option>
	     		</select>
	     		<input type="text" name="paid_amount"   placeholder= "Enter Paid Amount here" class="form-control form-control-sm paid_amount" id="paid_amount" style="display: none;">
				</div>

				<div>
					<button type="submit" class="btn btn-success">Update Payment</button>
				</div>

			</form>
	
	  
  			</div>
  		</div>


  		<br>
  		<br>
  	

  		 </div>
</div>

  	</div>

   

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
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
</script>
  </body>
</html>

 @endguest

@endsection
