@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Pending Invoices</h1>           
    </div>
 <div class="card-body">		

  

  <!--   <div class="container-sm"> -->
    	
	    <table class="table table-resposive table-sm table-hover  table-dark table-striped align-middle">
	    	 <thead >
			   <tr>
					<th  style="color:white;">Id</th>
					<th class="text-center" style="color:white;">Customer Name</th>
					<th class="text-center" style="color:white;">Invoice Number</th>
					<th class="text-center" style="color:white;">Date</th>
					<th class="text-center" style="color:white;">Description</th>
					<th class="text-center" style="color:white; " >Amount</th>
					<th class="text-center" style="color:white; " >Status</th>
					<th class="text-center" style="color:white;" >Action</th>
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

					<td style="color:yellow;">
						@if($d->status=='0')
							<span style="background: red; padding: 5px;">Pending</span>
						
						@elseif($d->status=='1')
							<span style="background: green; padding: 5px;">Approved</span>
						
						@endif
					</td>

					<td class="text-left">
						@if($d->status=='0')
						<a title="Approve" href="{{URL::to('edit-invoice-pending/'. $d->id) }}" class="btn btn bg-success"> <i class="fa fa-check-circle">
						Approve</i></a>

						<a title="Delete" href="{{URL::to('delete-invoice/'. $d->id) }}" class="btn btn bg-danger"> <i class="fa fa-trash">
												Delete</i></a>
						<<!-- a href="" class="btn btn bg-success">View</a> -->
						@endif
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