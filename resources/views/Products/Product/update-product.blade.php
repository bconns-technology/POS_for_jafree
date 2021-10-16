@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">Update Product</h1>          
    </div>
 <div class="card-body">	
 	
    <div class="container-sm">
    	<form method="POST" action="{{URL::to('update-product/'. $data->id)}}">
    		@csrf
			  <div class="mb-3">
			    <label for="name" class="form-label">Name</label>
			    <input type="text" name="name" class="form-control"value ="{{$data->name}}">
			  </div>

			  <div class="form-group has-success">
          	<div class="row">
          		<div class="col-md">
					<label for="category_id" class="form-label">Product Category</label>
					<select name="category_id" class="form-control">
						<option value="">Select Category</option>
						@foreach($categorys as $category)
						<option value="{{$category->id}}" {{($data->category_id)? "selected" : ''}}>	{{$category->name}}</option>
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
						<option value="{{$supplier->id}}" {{($data->suplier_id)? "selected" : ''}}>{{$supplier->name}}</option>
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
						<!-- <option value="{{$category->id}}" {{($data->category_id)? "selected" : ''}}>	{{$category->name}}</option> -->
						<option value="{{$unit->id}}" {{($data->unit_id)? "selected" : ''}}>{{$unit->name}}</option>
						@endforeach
					</select>
			   	</div>
			</div>
		 </div>
		 
			 <button type="submit" class="btn btn-primary">Update</button>
		</form>

<br>
<br>
			<div class="text-center">
   		<a href="{{route('view-product')}}" class="btn btn-success"> View Products </a>
   	</div>
   	<br>

    </div>

 </div>
</div>

 @endguest


@endsection


