@extends('layouts.app')

@section('content')

 <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    		<h1 class="text-center">Add New Unit</h1>           
    </div>
 <div class="card-body">		
  <div class="input-states">

     <form method="POST" action="{{route('insert-unit')}}" class="form-horizontal">
    
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
	   			<a href="{{route('view-unit')}}" class="btn btn-success">View Units </a>
	   		</div>

	  </div>
   </div>
</div>                

 @endguest
@endsection


 <!-- @php
     $prefix = Request::route()->getPrefix();
     $route= Route::current()->getName();
     @endphp  -->



   <!--  <div class="container-sm {{($prefix=='/Suppliers')?'menu-open':''}}">
    	<form method="POST" action="{{route('insert-supplier')}}" class="form-control {{($route=='view-supplier')?'active':''}}">
    		@csrf
			  <div class="mb-3">
			    <label for="name" class="form-label">Name</label>
			    <input type="text" name="name" class="form-control" placeholder="Please Enter Your Name here">
			  </div>

			  <div class="mb-3">
			    <label for="email" class="form-label">Email</label>
			    <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email Address here">
			  </div>

			   <div class="mb-3">
			    <label for="phone" class="form-label">Phone Number</label>
			    <input type="text" name="phone" class="form-control" placeholder="Please Enter Your Phone Number here">
			  </div>

			   <div class="mb-3">
			    <label for="address" class="form-label">Address</label>
			    <input type="text" name="address" class="form-control" placeholder="Please Upload Your Image here">
			  </div>
		 
			 <button type="submit" class="btn btn-primary">Submit</button>
		</form>

<br>
<br>
		<div class="text-center">
   		<a href="{{route('view-supplier')}}" class="btn btn-success"> View Suppliers </a>
   	</div>
   	<br>

	   

    </div>


  </div>
  
 {{($prefix=='/Suppliers')?'menu-open':''}} 
 	<div class="container {{($route=='view-supplier')?'active':''}} "></div>
 -->