@extends('layouts.app')

@section('content')

 <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    		<h1 class="text-center">Add New Product</h1>           
    </div>
 <div class="card-body">		
  <div class="input-states">

     <form method="POST" action="{{route('insert-product')}}" class="form-horizontal">
    
    	@csrf
         <div class="form-group has-success">
          	<div class="row">
          		<div class="col-md">
					<label for="name" class="form-label">Name</label>
					<input type="text" name="name" class="form-control" placeholder="Please Enter Your Name here">
			   	</div>
			</div>
		 </div>

		 <!-- <div class="form-group has-success">
          	<div class="row">
          		<div class="col-md">
					<label for="quantity" class="form-label">Quantity</label>
					<input type="text" name="quantity" class="form-control" placeholder="Please Enter quantity of Product">
			   	</div>
			</div>
		 </div> -->

		 <div class="form-group has-success">
          	<div class="row">
          		<div class="col-md">
					<label for="category_id" class="form-label">Product Category</label>
					<select name="category_id" class="form-control">
						<option value="">Select Category</option>
						@foreach($category as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endforeach
					</select>
			   	</div>
			</div>
		 </div>

		 <div class="form-group has-success">
          	<div class="row">
          		<div class="col-md">
					<label for="suplier_id" class="form-label">Supplier Name</label>
					<select name="suplier_id" class="form-control">
						<option value="">Select Supplier</option>
						@foreach($suppliers as $supplier)
						<option value="{{$supplier->id}}">{{$supplier->name}}</option>
						@endforeach
					</select>
			   	</div>
			</div>
		 </div>

		 <div class="form-group has-success">
          	<div class="row">
          		<div class="col-md">
					<label for="unit_id" class="form-label">Unit</label>
					<select name="unit_id" class="form-control">
						<option value="">Select Unit</option>
						@foreach($units as $unit)
						<option value="{{$unit->id}}">{{$unit->name}}</option>
						@endforeach
					</select>
			   	</div>
			</div>
		 </div>

		 

					<button type="submit" class="btn btn-primary">Submit</button>

				<!-- </div>  --> 

			</form>

				<div class="text-center">
	   			<a href="{{route('view-product')}}" class="btn btn-success">View Products </a>
	   		</div>

	  </div>
   </div>
</div>                

 @endguest
@endsection
