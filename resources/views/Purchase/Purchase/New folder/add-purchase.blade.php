

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>add purchase</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>


 <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    		<h1 class="text-center">Add New Purchase</h1>           
    </div>
 <div class="card-body">		
   
   <div class="form-row">

    	
    	<div class="col-4">
    	 <div class="form-group has-success"> 		
					<label for="suplier_id" class="form-label">Supplier Name</label>
					<select name="suplier_id" id="suplier_id" class="form-control">
						<option value="">Select Supplier</option>
						@foreach($suppliers as $suplier_id)
						<option value="{{$suplier_id->id}}">{{$suplier_id->name}}</option>
						@endforeach
					</select>
		 </div>
	</div>

			<div class="col-4">
			<div class="form-group has-success">
								<label for="category_id" class="form-label">Purchase Category</label>
								<select name="category_id" id="category_id" class="form-control">
									<option value="">Select Category</option>
								</select>
					 </div>
			</div>

<div class="col-4">
		 <div class="form-group has-success">
					<label for="product_id" class="form-label">Products Name</label>
					<select name="product_id" class="form-control">
						<option value="">Select Product</option>
					</select>
		 </div>	
</div>
		<div class="col-4">
         <div class="form-group has-success">
					<label for="purchase_number" class="form-label">Purchase Number</label>
					<input type="text" name="purchase_number" class="form-control" placeholder="Please Enter Purchase Number">
		 </div>
		</div>

		<div class="col-4">
		 <div class="form-group has-success">
					<label for="date" class="form-label datetimepicker">Purchase Date</label>
					<input type="datetimepicker" name="date" id="datetimepicker" class="form-control" placeholder="YYYY-MM-DD" readonly>
		 </div>
	</div>
	<div class="col-4">
		 <div class="form-group has-success" style="padding-top: 30px;">
					<button type="submit"  class="btn btn-primary addMoreEvent">+ Add more</button>
		 </div>
	</div>
					
	  </div>
   </div>
</div>   



<script type="text/javascript">
$(function(){
	$(document).on('change','#suplier_id', function(){
		var suplier_id = $(this).val();
		$.ajax({
			url:"{{route('get-category')}}",
			type:"GET",
			data:{suplier_id:suplier_id},
			success:function(data){
				var html= '<option value="">Select Category</option>';
				$.each(data,function(key,v){
					html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';
				});
				$('#category_id').html(html);
			}
		});
	});
});

</script> 

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $('.date').datepicker(format :'yyyy-mm-dd');        
    });
</script> -->


  

    <script type="text/javascript">
        $(function() {
           $('#datetimepicker').datetimepicker();
        });
    </script>
          

 @endguest

 </body>
</html>



