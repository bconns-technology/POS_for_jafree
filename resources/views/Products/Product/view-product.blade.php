@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Products</h1>           
    </div>
 <div class="card-body">		

   	<div class="text-center">
   		<a href="{{route('add-product')}}" class="btn btn-primary"> Add Product </a>
   	</div>

   	<br>
   	<br>

  <!--   <div class="container-sm"> -->
    	<div class="table-sm table-responsive ">
	    <table class="table table-hover table-dark table-striped align-middle">
	    	 <thead >
			   <tr>
					<th  style="color:white;">Id</th>
					<th class="text-center" style="color:white;">Product Category</th>
					<th class="text-center" style="color:white;">Name</th>
					<th class="text-center" style="color:white;">Supplier Name</th>
					<th class="text-center" style="color:white;">Unit</th>
					<th style="color:white;" class="text-center">Action</th>
				</tr>
	 		 </thead>

	 		 <tbody>
	 		 	@foreach($data as $d)
			    <tr >
					<td style="color:yellow;">{{$d->id}}</td>
					<td style="color:yellow;">{{$d['category']['name']}}</td>
					<td style="color:yellow;">{{$d->name}}</td>
					<td style="color:yellow;">{{$d['supplier']['name']}}</td>
					<td style="color:yellow;">{{$d['unit']['name']}}</td>



					<td>
						 <a href="{{URL::to('edit-product/'. $d->id) }}" class="btn btn bg-primary">Edit</a> 
						<a href="{{URL::to('delete-product/'. $d->id) }}" class="btn btn bg-danger">Delete</a>
						<<!-- a href="" class="btn btn bg-success">View</a> -->
					</td>
				</tr>
				@endforeach
	 		 </tbody>

	    </table>

    </div>
   </div>
</div>
<!-- </div>
 -->
 @endguest

@endsection