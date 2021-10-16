@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Units</h1>           
    </div>
 <div class="card-body">		

   	<div class="text-center">
   		<a href="{{route('add-unit')}}" class="btn btn-primary"> Add Unit </a>
   	</div>

   	<br>
   	<br>

    <div class="container-sm">

	    <table class="table table-dark table-striped">
	    	 <thead >
			   <tr>
					<th  style="color:white;">Id</th>
					<th class="text-center" style="color:white;">Name</th>
					<th style="color:white;" class="text-center">Action</th>
				</tr>
	 		 </thead>

	 		 <tbody>
	 		 	@foreach($data as $d)
			    <tr >
					<td style="color:yellow;">{{$d->id}}</td>
					<td style="color:yellow;">{{$d->name}}</td>
					<td>
						 <a href="{{URL::to('edit-unit/'. $d->id) }}" class="btn btn bg-primary">Edit</a> 
						<a href="{{URL::to('delete-unit/'. $d->id) }}" class="btn btn bg-danger">Delete</a>
						<<!-- a href="" class="btn btn bg-success">View</a> -->
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