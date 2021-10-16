@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">Update Unit</h1>          
    </div>
 <div class="card-body">	
 	
    <div class="container-sm">
    	<form method="POST" action="{{URL::to('update-unit/'. $data->id)}}">
    		@csrf
			  <div class="mb-3">
			    <label for="name" class="form-label">Name</label>
			    <input type="text" name="name" class="form-control"value ="{{$data->name}}">
			  </div>
		 
			 <button type="submit" class="btn btn-primary">Update</button>
		</form>

<br>
<br>
			<div class="text-center">
   		<a href="{{route('view-unit')}}" class="btn btn-success"> View Units </a>
   	</div>
   	<br>

    </div>

 </div>
</div>

 @endguest


@endsection


