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
	  	<div class="row">
	  		<div class="col-md-12">
	  			<table width="100%">
			   		<tbody>
			   			<tr >
			   				<td ><h2 >JAFREE MACHINERY & TOOLS</h2></td>	
						</tr>

						
						
						<tr>
							<td width="45%">226, Nobabpur Road, Near Manoshi Complex </td>
							<td width="20%">Call- 01711-349098</td>
							<td width="35%">Web: www.jafreemachinery.com</td>
						</tr>
						<tr>
							<td></td>

						</tr>
						<tr>
							<td width="20%"></td>
							<td><h2 >View Stock </h2></td>
							<td width="20%"></td>
						</tr>
			   		</tbody>
			   	</table>

	   		</div>
		</div>

		
<hr>

<br>
<br>
  		<div class="row">
  			<div class="col-md-12">
	   
	    <table border="3" class="table-responsive" width="100%">
	    	<thead >
	    		<tr class="text-center">
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
  		<div class="row">
  			<div class="col-md-12">
  				<hr style="margin-bottom: 0px;">
  				<table border="0" width="100%">
  					<tbody>
  						<tr>
  							<td width="20%"></td>

  							<td style="width: 40%;">
  								<p style="text-align: center; margin-left: : 20px;"> Seller Signature
  							</td>

  						</tr>
  					</tbody>
  				</table>

			</div>
  		</div>
  	</div>

  	@php
  		$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
  	@endphp
  	<i>Printing Time : {{$date-> format('F j,Y, g:i a')}} 	</i>

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>


