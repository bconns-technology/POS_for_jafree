@extends('layouts.app')

@section('content')

 <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    		<h1 class="text-center">Add New Category</h1>           
    </div>
 <div class="card-body">		
  <div class="input-states">

     <form method="POST" action="{{route('insert-category')}}" class="form-horizontal">
    
    	@csrf
         <div class="form-group has-success">
          	<div class="row">
          		<div class="col-md">
								  <label for="name" class="form-label">Name</label>
					   			<input type="text" name="name" class="form-control" placeholder="Please Enter Your Name here">
			   			</div>
					  </div>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>

				<!-- </div>  --> 

			</form>

				<div class="text-center">
	   			<a href="{{route('view-category')}}" class="btn btn-success">View Categorys </a>
	   		</div>

	  </div>
   </div>
</div>                

 @endguest
@endsection
