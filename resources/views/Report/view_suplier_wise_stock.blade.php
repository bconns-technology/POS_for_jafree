<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS public/bootstrap-5.1.3-dist/css/bootstrap.min.css-->
    <link href="{{asset('public/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <title>Stock Report</title>
  </head>
  <body>
  	<div class="container-sm">
  		<h1 style="text-align: center;" >JAFREE MACHINERY & TOOLS</h1>
  		<hr style="width: 70%;">
  		<div class="row">
			<p>226, Nobabpur Road, Near Manoshi Complex</p>
			<p>		Web: www.jafreemachinery.com </p>
			<p>Call- 01711-349098</p>
  		</div>
  	
 <div class="row">
  	<div class="col-md-12">
  					
	
 
 
<hr style="margin-bottom: 0px;">
  			</div>

  		</div>

  		<h1 style="text-align: center;">Stock Report From {{$suppliers->name}}</h1>
  		<hr style="width:70%;">
  		<br>

  		<div class="row">
  			<div class="col-md-12">
	   
	    <table border="3" class="table-responsive" width="100%">
	    	<thead >
			   <tr>

			   	<th>SL. No.</th>
					<th>Product Category</th>
					<th>Product Name</th>
					<th>Supplier Name</th>
					<th>Stock</th>
					<th class="text-center">Unit</th>

			
				</tr>
	 		 </thead>
	 		 <tbody>
	 		 		@foreach($data as $d)
			    <tr class="text-center" >
					<td>{{$d->id}}</td>
					<td>{{$d['category']['name']}}</td>
					<td>{{$d->name}}</td>
					<td>{{$d['supplier']['name']}}</td>
					<td>{{$d->quantity}}</td>
					<td class="text-center">{{$d['unit']['name']}}</td>
				</tr>
				@endforeach

	 		 </tbody>

	    	

	    </table>
	  
  			</div>
  		</div>


  		<br>
  		<br>

  		<hr style=" width: 25%; margin-right: 0px;">
  		<p style="text-align: right;"> Seller Signature</p>
  		
  	</div>

   

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>