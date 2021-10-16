@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Invoices</h1>           
    </div>
    <div class="card-header">
    	<h2>Invoice No # {{$invoice->invoice_number}}({{date('d-m-Y', strtotime($invoice->date))}})</h2>
    </div>
 <div class="card-body">

	<br>
   
   	<div class="text-right">
   		<a href="{{route('view-invoice-pending')}}" class="btn btn-primary"> View Pending Invoice </a>
   	</div>
	<br>
   	<br>
   	<br>
   	@php
   	$payment= App\Models\Models\Payment::where('invoice_id',$invoice->id)->first();
   	@endphp
 
   	<table>
   		<tbody>
   			<tr>
   				<td width="100%" class="text-left"><h2>Customer Info</h2></td>
			</tr>	

			<tr>
				<td  width="100%" class="text-left">><h2>Name: {{$payment['customer']['name']}}</h2></td>				
			</tr>
			<tr>
   				<td  width="100%" class="text-left">><h2>Mobile Number: {{$payment['customer']['phone']}}</h2></td>
			</tr>
			<tr>
				<td  width="100%" class="text-left">><h2>Address: {{$payment['customer']['address']}}</h2> </td>
			</tr>

			<br>
			<br>
			<br>
			<tr>
<td></td>
			</tr>			
				<tr> 
				<td width="100%" class="text-left"><h2><strong>Description: </strong>{{$invoice->description}}</h2></td>
   			</tr>
   		</tbody>	
   	</table>

  

  <!--   <div class="container-sm"> -->
    	<form method="POST" action="{{URL::to('approve-invoice-pending/'. $invoice->id)}}" class="form-horizontal">
      	@csrf	
	   
	    <table border="3" class="table  table-sm table-hover  table-dark table-striped align-middle">
	    	 <thead >
			   <tr>
					<th  style="color:white;">Id</th>
					<th class="text-center" style="color:white;">Category</th>
					<th class="text-center" style="color:white;">Product Name</th>
					<th class="text-center" style="color:white;">Current Stock</th>
					<th class="text-center" style="color:white;">Quantity</th>
					<th class="text-center" style="color:white; width: 12%;" >Unit Price</th>
					<th class="text-center" style="color:white; width: 12%;" >Total Price</th>
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
					<td style="color:yellow;">{{$key+1}}</td>
					<td style="color:yellow;">{{$d['category']['name']}}</td>
					<td style="color:yellow;">{{$d['product']['name']}}</td>
					<td style="color:yellow;">	{{$d['product']['quantity']}}</td>
					<td style="color:yellow;">{{$d->selling_quantity}}</td>
					<td style="color:yellow;">{{$d->unit_price}}</td>
					<td style="color:yellow;">{{$d->selling_price}}</td>
					
				</tr>
				@php
	 		 	$total_sum+=$d->selling_price;
	 		 	@endphp
				@endforeach
				<tr>
					<td colspan="6" class="text-right"> <strong>Sub Total</strong></td>
					<td> {{$total_sum}}</td>
				</tr>
				<tr>
					<td colspan="6" class="text-right"> Discount</td>
					<td> {{$payment->discount_amount}}</td>
				</tr>

				<tr>
					<td colspan="6" class="text-right"> Paid Amount</td>
					<td> {{$payment->paid_amount}}</td>
				</tr>
	 		 <tr>
					<td colspan="6" class="text-right"> Due Amount</td>
					<td> {{$payment->due_amount}}</td>
				</tr>

				<tr>
					<td colspan="6" class="text-right"><strong> Grand Total</strong></td>
					<td> {{$payment->total_amount}}</td>
				</tr>
	 		 </tbody>

	    </table>
	    <button type="submit" class="btn btn-success">Approve Invoice</button> 

	</form>

    
   </div>
</div>
<!-- </div>
 -->
 @endguest

@endsection




