@extends('layouts.app')

@section('content')

 <!-- Authentication Links -->
   
                    
     @guest

     @else
<!DOCTYPE html>
<html>
<head>
  <title>Daily Purchase Report</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
  
<body>
    <div class="card">
    <div class="card-title">
            <h1 class="text-center">View Date-wise Purchase</h1>           
    </div>
 <div class="card-body"> 

 <form method="GET" action="{{route('print-daily-purchase-report')}}" target="_blank">
       
   <div class="form-row">
        <div class="col-4">
         <div class="form-group has-success">
                    <label for="start_date" class="form-label datepicker">Start Date</label>
                    <input type="text" name="start_date" id="start_date" class=" form-control start_date" placeholder="YYYY-MM-DD" readonly>
         </div>
        </div>

    
         <div class="form-group has-success">
                    <label for="end_date" class="form-label datepicker">End Date</label>
                    <input type="text" name="end_date" id="end_date" class="  form-control end_date" placeholder="YYYY-MM-DD" readonly>
         </div>
    </div>

    <div class="col-4">
         <div class="form-group has-success" style="padding-top: 30px;">
            <button type="submit" class="btn btn-primary">Search</button>   
         </div>
    </div>


 </form>
                    
      </div>
   </div>

   
<!-- <div class="container">
    <h1>Laravel Bootstrap Datepicker</h1>
    <input class="date form-control" type="text">
</div> -->
  
<script type="text/javascript">
   

     $('.start_date').datepicker({  
       format: 'yyyy-mm-dd'
     });

     $('.end_date').datepicker({  
       format: 'yyyy-mm-dd'
     }); 

</script> 
  
</body>
  
</html>











   
          

 @endguest
@endsection


