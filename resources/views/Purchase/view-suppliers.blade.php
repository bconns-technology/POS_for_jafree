@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Suppliers</h1>           
    </div>
 <div class="card-body">		

   	<div class="text-center">
   		<a href="{{route('add-supplier')}}" class="btn btn-primary"> Add Supplier </a>
   	</div>

   	<br>
   	<br>

    <div class="table-sm table-responsive ">
	    <table class="table table-hover table-dark table-striped align-middle">
	    	 <thead >
			   <tr class="text-center" style="color:white;">
					<th >Id</th>
					<th style="color:white;">Name</th>
					<th style="color:white;">Email Address</th>
					<th style="color:white;">Phone Number</th>
					<th style="color:white;">Address</th>
					<th style="color:white;" class="text-center" >Action</th>
				</tr>
	 		 </thead>

	 		 <tbody>
	 		 	@foreach($data as $d)
			    <tr>


					<td style="color:yellow;">{{$d->id}}</td>
					<td style="color:yellow;">{{$d->name}}</td>
					<td style="color:yellow;">{{$d->email}}</td>
					<td style="color:yellow;">{{$d->phone}}</td>
					<td style="color:yellow;">{{$d->address}}</td>

						@php
						$count_suplier=App\Models\Models\Product::where('suplier_id',$d->id)->count();

					@endphp


						


					<td>
						 <a href="{{URL::to('edit-supplier/'. $d->id) }}" class="btn btn bg-primary">Edit</a>  @if($count_suplier<1)
						<a href="{{URL::to('delete-supplier/'. $d->id) }}" class="btn btn bg-danger">Delete</a>
						<<!-- a href="" class="btn btn bg-success">View</a> -->@endif
					</td>
				</tr>
				@endforeach
	 		 </tbody>

	    </table>

    </div>
   </div>
</div>


 @endguest

@endsection