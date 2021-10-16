@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Invoices</h1>           
    </div>
 <div class="card-body">		

   	<div class="text-center">
   		<a href="{{route('add-invoice')}}" class="btn btn-primary"> Add Invoice </a>
   	</div>

   	<br>
   	<br>

  <!--   <div class="container-sm"> -->
    	
	    <table class="table table-sm table-hover  table-dark table-striped align-middle">
	    	 <thead >
			   <tr>
					<th  style="color:white;">Id</th>
					<th class="text-center" style="color:white;">Customer Name</th>
					<th class="text-center" style="color:white;">Invoice Number</th>
					<th class="text-center" style="color:white;">Date</th>
					<th class="text-center" style="color:white;">Description</th>
					<th class="text-center" style="color:white; width: 12%;" >Amount</th>
				</tr>
	 		 </thead>
	 		 <tbody>
	 		 	@foreach($data as $d)
			    <tr class="text-center" >
					<td style="color:yellow;">{{$d->id}}</td>
					<td style="color:yellow;">
					{{$d['payment']['customer']['name']}}					({{$d['payment']['customer']['phone']}}-{{$d['payment']['customer']['address']}})</td>
					<td style="color:yellow;">Invoice No#{{$d->invoice_number}}</td>
					<td style="color:yellow;">{{date('d-m-Y', strtotime($d->date))}}</td>
					<td style="color:yellow;">{{$d->description}}</td>
					<td class="text-center" style="color:yellow;">	{{$d['payment']['total_amount']}}	
						
					</td>
					
				</tr>
				@endforeach
	 		 </tbody>

	    </table>

    
   </div>
</div>
<!-- </div>
 -->
 @endguest

@endsection