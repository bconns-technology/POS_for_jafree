<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS public/bootstrap-5.1.3-dist/css/bootstrap.min.css-->
    <link href="{{asset('public/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <title>Hello, world!</title>
  </head>
  <body>
  	<div class="container-sm">
  	<div class="row">
  		<div class="col-md-12">

    	<h2>Invoice No # {{$invoice->invoice_number}}({{date('d-m-Y', strtotime($invoice->date))}})</h2>
    </div>
</div>
<hr style="margin-bottom: 0px;">

  		<div class="row">
  			<div class="col-md-12">
  					
	
   	@php
   	$payment= App\Models\Models\Payment::where('invoice_id',$invoice->id)->first();
   	@endphp
 
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
			</tr>			
				<tr> 
				<td width="35%" class="text-left"><h3><strong>Description: </strong>{{$invoice->description}}</h3></td>
   			</tr>
   		</tbody>	

   	</table>


  			</div>

  		</div>

  		<div class="row">
  			<div class="col-md-12">
	   
	    <table border="3" class="table  table-sm table-hover  table-dark table-striped align-middle">
	    	 <thead >
			   <tr>
					<th >Id</th>
					<th class="text-center">Category</th>
					<th class="text-center" >Product Name</th>
					<th class="text-center">Current Stock</th>
					<th class="text-center" >Quantity</th>
					<th class="text-center" >Unit Price</th>
					<th class="text-center" >Total Price</th>
				</tr>
	 		 </thead>
	 		 <tbody>
	 		 	@php
	 		 	$total_sum='0';
	 		 	@endphp

	 		 	@foreach($invoice['invoice_details'] as $key=> $d)
			    <tr class="text-center" >
			    	<input type="hidden" name="category_id[]" value="{{$d->category_id}}">
			    	<input type="hidden" name="product_id[]" value="{{$d->product_id}}">
			    	<input type="hidden" name="selling_quantity[{{$d->id}}]" value="{{$d->selling_quantity}}">
					<td>{{$key+1}}</td>
					<td>{{$d['category']['name']}}</td>
					<td>{{$d['product']['name']}}</td>
					<td>	{{$d['product']['quantity']}}</td>
					<td>{{$d->selling_quantity}}</td>
					<td>{{$d->unit_price}}</td>
					<td>{{$d->selling_price}}</td>
					
				</tr>
				@php
	 		 	$total_sum+=$d->selling_price;
	 		 	@endphp
				@endforeach
				<tr>
					<td colspan="6" > <strong>Sub Total</strong></td>
					<td> {{$total_sum}}</td>
				</tr>
				<tr>
					<td colspan="6" > Discount</td>
					<td> {{$payment->discount_amount}}</td>
				</tr>

				<tr>
					<td colspan="6" > Paid Amount</td>
					<td> {{$payment->paid_amount}}</td>
				</tr>
	 		 <tr>
					<td colspan="6" class="text-center"> Due Amount</td>
					<td> {{$payment->due_amount}}</td>
				</tr>

				<tr>
					<td colspan="6" class="text-right"><strong> Grand Total</strong></td>
					<td> {{$payment->total_amount}}</td>
				</tr>
	 		 </tbody>

	    </table>
	  
  			</div>
  		</div>


  		<br>
  		<br>
  		<div class="row">
  			<div class="col-md-12">
  				<hr style="margin-bottom: 0px;">
  				<table border="0" width="100%">
  					<tbody>
  						<tr>
  							<td style="width: 40%;">
  								<p style="text-align: center; margin-left: : 20px;"> Customer Signature
  							</td>

  							<td width="20%"></td>

  							<td style="width: 40%;">
  								<p style="text-align: center; margin-left: : 20px;"> Seller Signature
  							</td>

  						</tr>
  					</tbody>
  				</table>

			</div>
  		</div>
  	</div>

   

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>