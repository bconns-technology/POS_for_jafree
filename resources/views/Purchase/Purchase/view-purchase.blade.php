@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Purchases</h1>           
    </div>
 <div class="card-body">		

   	<div class="text-center">
   		<a href="{{route('add-purchase')}}" class="btn btn-primary"> Add purchase </a>
   	</div>

   	<br>
   	<br>

  <!--   <div class="container-sm"> -->
    	
	    <table class="table table-hover table-sm table-dark table-striped align-middle table-responsive">
	    	 <thead >
			   <tr>
					<th  style="color:white;">Id</th>
					<th class="text-center" style="color:white;">Supplier Name</th>
					<th class="text-center" style="color:white;">Category</th>
					<th class="text-center" style="color:white;">Products Name</th>
					<th class="text-center" style="color:white;">Purchase Number</th>
					<th class="text-center" style="color:white;">Purchase Date</th>
					<th class="text-center" style="color:white;">Description</th>
					<th class="text-center" style="color:white;">Quantity</th>
					<th class="text-center" style="color:white;">Unit Price</th>
					<th class="text-center" style="color:white;">Totall Price</th>
					<th class="text-center" style="color:white;">Stutas</th>
					<th class="text-center" style="color:white; width: 12%;" >Action</th>
				</tr>





	 		 </thead>

	 		 <tbody>
	 		 	@foreach($data as $d)
			    <tr >
					<td style="color:yellow;">{{$d->id}}</td>
					<td style="color:yellow;">{{$d['supplier']['name']}}</td>
					<td style="color:yellow;">{{$d['category']['name']}}</td>
					<td style="color:yellow;">{{$d['product']['name']}}</td>
					<td style="color:yellow;">{{$d->purchase_number}}</td>
					<td style="color:yellow;">{{date('d-m-Y', strtotime($d->date))}}</td>
					<td style="color:yellow;">{{$d->description}}</td>
					<td style="color:yellow;">
						{{$d->buying_quantity}}
						{{$d['product']['unit']['name']}}
					</td>
					<td style="color:yellow;">{{$d->unit_price}}</td>
					<td style="color:yellow;">{{$d->buying_price}}</td>
					<td style="color:yellow;">
						@if($d->status=='0')
							<span style="background: red; padding: 5px;">Pending</span>
						
						@elseif($d->status=='1')
							<span style="background: green; padding: 5px;">Approved</span>
						
						@endif
					</td>

					<td>
						@if($d->status=='0')
						<a href="{{URL::to('delete-purchase/'. $d->id) }}" class="btn btn bg-danger">Delete</a>
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