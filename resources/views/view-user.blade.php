<!-- @extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
               
                    </div> <!-- container -->
                    <div class="container">
                    	<div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Company</th>
                                                        <th data-priority="1">Last Trade</th>
                                                        <th data-priority="3">Trade Time</th>
                                                        <th data-priority="1">Change</th>
                                                        <th data-priority="3">Prev Close</th>
                                                        <th data-priority="3">Open</th>
                                                        <th data-priority="6">Bid</th>
                                                        <th data-priority="6">Ask</th>
                                                        <th data-priority="6">1y Target Est</th>
                                                        <th data-priority="6">Lorem</th>
                                                        <th data-priority="6">Ipsum</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td colspan="2">Spanning cell</td>
                                                    </tr>      
                                                    <tr>
                                                        <th>AAPL <span class="co-name">Apple Inc.</span></th>
                                                        <td>378.94</td>
                                                        <td>12:22PM</td>
                                                        <td>5.74 (1.54%)</td>
                                                        <td>373.20</td>
                                                        <td>381.02</td>
                                                        <td>378.92 x 300</td>
                                                        <td>378.99 x 100</td>
                                                        <td>505.94</td>
                                                        <td colspan="2">Spanning cell</td>
                                                    </tr>      
                                                    
                                                    
                                                    
                                                </tbody>
                                            </table>


                    </div>
                               
                </div> <!-- content -->

                 </div> <!-- content page -->
@endsection




