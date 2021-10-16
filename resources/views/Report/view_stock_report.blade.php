@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Stock</h1>     
    	<br>
	<div class="text-right">
   		<a title="Download Stock Report" href="{{route('view-stock-report-pdf')}}" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i>Download Stock</a>
   	</div>      
    </div>
 <div class="card-body">		

   	
   	<br>

  <!--   <div class="container-sm"> -->
    	<div class="table-sm table-responsive ">
	    <table class="table table-hover table-dark table-striped align-middle">
	    	 <thead >
			   <tr>
					<th class="text-center" style="color:white;">SL. No.</th>
					<th class="text-center" style="color:white;">Product Category</th>
					<th class="text-center" style="color:white;">Product Name</th>
					<th class="text-center" style="color:white;">Supplier Name</th>
					<th class="text-center" style="color:white;">Stock</th>
					<th style="color:white;" class="text-center">Unit</th>
				</tr>
	 		 </thead>

	 		 <tbody>
	 		 	@foreach($data as $d)
			    <tr class="text-center" >
					<td style="color:yellow;">{{$d->id}}</td>
					<td style="color:yellow;">{{$d['category']['name']}}</td>
					<td style="color:yellow;">{{$d->name}}</td>
					<td style="color:yellow;">{{$d['supplier']['name']}}</td>
					<td style="color:yellow;">{{$d->quantity}}</td>
					<td style="color:yellow;" class="text-center">{{$d['unit']['name']}}</td>
				</tr>
				@endforeach
	 		 </tbody>

	    </table>


  

    </div>
   </div>
</div>
<!-- </div>
 -->
 @endguest

@endsection