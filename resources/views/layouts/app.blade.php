<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BConns Technology</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

<!-- http://localhost/bconns_pos/public/assets/js/lib/bootstrap.min.js.map
http://localhost/bconns_pos/public/assets/js/lib/chartist/chartist.min.js.map
http://localhost/bconns_pos/public/assets/css/lib/bootstrap.min.css.map -->


<link href="{{asset('public/assets/css/lib/bootstrap.min.css.map')}}" rel="stylesheet">
    <!-- Styles -->
  <link href="{{asset('public/assets/css/lib/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
   

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    
</head>

<body>

     <div>
                        <!-- Authentication Links -->
   
                    
     @guest

     @else
    

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="">
                            <!-- <img src="assets/images/logo.png" alt="" /> --><span>JAFREE MACHINERY & TOOLS</span></a></div>
                    <li class="label">Main</li>
                    <li>
                    <a  href="{{route('home')}}"><i class="ti-home"></i> Dashboard  <!-- <span
                                class="sidebar-collapse-icon ti-angle-down"> </span>--></a>
                      
                    </li>

                   
                    <li class="label">Features</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Products & Inventory <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i>Manage Product <span
                                        class="sidebar-collapse-icon ti-angle-down"></span></a>
                                <ul>
                                    <li><a href="{{route('view-product')}}">View & Manage All Products</a></li>
                                    <li><a href="ui-alerts.html">Category wise Products</a></li>
                                    <li><a href="ui-button.html">Sales Pricing</a></li>
                                </ul>
                            </li>

                            <li><a href="{{route('view-category')}}">Product Category</a></li>
                            <li><a href="{{route('view-unit')}}">Manage Units</a></li>
                            <li><a href="ui-button.html">Sales Pricing</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Purchase <span  
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{route('view-supplier')}}">Manage Suppliers</a></li>
                            <li><a href="{{route('view-purchase')}}">Purchase Order Entry</a></li>
                            <li><a href="{{route('view-pending')}}">View Pending Purchase</a></li>
                            <li><a href="{{route('view-daily-purchase-report')}}">View Daily Purchase</a></li>
                            <li><a href="uc-weather.html">Payment to Supplier</a></li>
                            
                        </ul>
                    </li>
<!-- 
                    <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Manage Invoice<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{route('view-invoice')}}">View Invoice</a></li>
                            <li><a href="{{route('add-invoice')}}">Add Invoiec</a></li>

                            <li><a href="{{route('view-invoice-pending')}}">Approve Invoicec</a></li>

                            
                        </ul>
                    </li>
 -->
                    
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> POS <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{route('view-invoice')}}">View Invoice</a></li>
                            <li><a href="{{route('add-invoice')}}">Add Invoiec</a></li>

                            <li><a href="{{route('view-invoice-pending')}}">Approve Invoicec</a></li>
                            <li><a href="{{route('print-invoice')}}">Print POS</a></li>
                        </ul>
                    </li>

                    <!-- <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Sales <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="table-basic.html">Sales Quotation Entry</a></li>

                            <li><a href="table-export.html">Direct Delivery</a></li>
                            <li><a href="table-row-select.html">Direct Invoice</a></li>
                            <li><a href="table-jsgrid.html">Delivery against Sales </a></li>
                            <li><a href="table-jsgrid.html">Invoice against Sales </a></li>
                            <li><a href="font-themify.html">Sales Type</a></li>
                            <li><a href="font-themify.html">Sales Payment</a></li>
                            <li><a href="font-themify.html">Sales Area</a></li>   
                        </ul>
                    </li> -->

                    <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Manage Customer<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{route('view-customer')}}">Add & View Customer</a></li>
                            <li><a href="font-themify.html">Customer Branches</a></li>

                            <li><a href="table-basic.html">Customer Payment</a></li>

                            <li><a href="{{route('view-customer-credit-report')}}">Customer Credit Note</a></li>  
                            
                        </ul>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Reports <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>

                            <li><a href="{{route('view-stock-report')}}">Stock Report</a></li>
                            <li><a href="{{route('view-p_s_c-stock-report')}}">Product/Supplier/Category Wise Stock</a></li>
                            <li><a href="table-basic.html">Sales Quotation Entry</a></li>
                            <li><a href="{{route('view-daily-invoice-report')}}">Daily Invoice Report</a></li>
                            <li><a href="table-export.html">Direct Delivery</a></li>
                            <li><a href="table-row-select.html">Direct Invoice</a></li>
                            <li><a href="table-jsgrid.html">Delivery against Sales </a></li>
                            <li><a href="table-jsgrid.html">Invoice against Sales </a></li>
                            
                            <li><a href="font-themify.html">Sales Payment</a></li>
                            <li><a href="font-themify.html">Sales Area</a></li>   
                        </ul>
                    </li>

                   
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                                 <i class="md md-settings-power"></i>
                                                    {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                       <!--  <a><i class="ti-close"></i> Logout</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left"> New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">



                            <div class="header-icon" data-toggle="dropdown">
                                 <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{Auth::user()->name}}" class="img-circle"> <span>{{Auth::user()->name}}</span></a>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                   <!--  <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div> -->
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                                 <i class="md md-settings-power"></i>
                                                    {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      

 @endguest

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                 @yield('content')
            </div>
        </div>
    </div>

    <footer class="footer text-right">
                    2021 © Bconns.
                </footer>

    <!-- jquery vendor -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
   
    <script src="{{asset('public/assets/js/lib/jquery.min.js')}}"></script>
     <script src="{{asset('public/assets/js/jquery-ui.js')}}"></script>
       <script src="{{asset('public/assets/js/handlebars.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{asset('public/assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->

    <script src="{{asset('public/assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/js/scripts.js')}}"></script>
    <!-- bootstrap -->

    <script src="{{asset('public/assets/js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/calendar-2/pignose.init.js')}}"></script>


    <script src="{{asset('public/assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('public/assets/js/dashboard2.js')}}"></script>

   <script src="{{asset('public/assets/js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('public/assets/js/lib/bootstrap.min.js.map')}}"></script>

    <script src="{{asset('public/assets/js/lib/chartist/chartist.min.js.map')}}"></script>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


  

</div>

</body>

</html>