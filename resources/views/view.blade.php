<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <title>Manage Suppliers</title>
  </head>
  <body>
  	<h1 class="text-center">View Suppliers</h1>
   	

   	<div class="text-center">
   		<a href="{{route('add-supplier')}}" class="btn btn-primary"> Add Supplier </a>
   	</div>

   	<br>
   	<br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <div class="container-sm">

	    <table class="table table-dark table-striped">
	    	 <thead>
			   <tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email Address</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
	 		 </thead>

	 		 <tbody>
	 		 	@foreach($data as $d)
			    <tr>
					<td>{{$d->id}}</td>
					<td>{{$d->name}}</td>
					<td>{{$d->email}}</td>
					<td>{{$d->phone}}</td>
					<td>{{$d->address}}</td>
					<td>
						 <a href="{{route('edit-supplier/'. $d->id) }}" class="btn btn bg-primary">Edit</a> 
						<a href="{{route('delete-supplier/'. $d->id) }}" class="btn btn bg-danger">Delete</a>
						<a href="" class="btn btn bg-success">View</a>
					</td>
				</tr>
				@endforeach
	 		 </tbody>

	    </table>

    </div>


  </body>
</html>


