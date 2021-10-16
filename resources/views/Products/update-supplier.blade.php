@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">Update Supplier</h1>          
    </div>
 <div class="card-body">	
 	
    <div class="container-sm">
    	<form method="POST" action="{{URL::to('update-supplier/'. $data->id)}}">
    		@csrf
			  <div class="mb-3">
			    <label for="name" class="form-label">Name</label>
			    <input type="text" name="name" class="form-control"value ="{{$data->name}}">
			  </div>

			  <div class="mb-3">
			    <label for="email" class="form-label">Email</label>
			    <input type="email" name="email" class="form-control" value ="{{$data->email}}">
			  </div>

			   <div class="mb-3">
			    <label for="phone" class="form-label">Phone Number</label>
			    <input type="text" name="phone" class="form-control" value ="{{$data->phone}}">
			  </div>

			   <div class="mb-3">
			    <label for="address" class="form-label">Address</label>
			    <input type="text" name="address" class="form-control" value ="{{$data->address}}">
			  </div>
		 
			 <button type="submit" class="btn btn-primary">Update</button>
		</form>

<br>
<br>
			<div class="text-center">
   		<a href="{{route('view-supplier')}}" class="btn btn-success"> View Suppliers </a>
   	</div>
   	<br>

    </div>

 </div>
</div>

 @endguest


@endsection


