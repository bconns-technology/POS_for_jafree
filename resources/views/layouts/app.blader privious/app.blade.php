<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
   <!-- Base Css Files -->
        <link href="{{asset('public/StyleLinks/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('public/StyleLinks/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/StyleLinks/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/StyleLinks/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('public/StyleLinks/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('public/StyleLinks/css/waves-effect.css')}}" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="{{asset('public/StyleLinks/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('public/StyleLinks/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/StyleLinks/css/style.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div>
        
        <!-- Begin page -->
        <div id="wrapper">
                        <!-- Authentication Links -->
   
                    
                        @guest
                            <!-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                           <!--  <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> -->

                            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>BConns </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{Auth::user()->name}}" alt="user-img" class="img-circle"> <span>{{Auth::user()->name}}</span></a>


                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                       
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
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


           

            
        </div>

         <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.html" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><!-- <i class="md md-mail"></i> --><span> Manage User </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view-user')}}">View User</a></li>
                                </ul>
                            </li>

                            <li class="nav-item has_treeview">
                                <a href="#" class="waves-effect"><!-- <i class="md md-mail"></i> --><span> Manage Purchase </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view-supplier')}}">Supliers</a></li>
                                    <li><a href="email-compose.html">Purchase Order Entry</a></li>
                                    <li><a href="email-read.html">Payment</a></li>
                                </ul>
                            </li>

                           

                           
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

                        @endguest
                    
          

        <main class="py-4">
            @yield('content')
        </main>


          <footer class="footer text-right">
                    2021 © Bconns.
                </footer>




      <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('public/StyleLinks/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/StyleLinks/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/StyleLinks/js/waves.js')}}"></script>
        <script src="{{asset('public/StyleLinks/js/wow.min.js')}}"></script>
        <script src="{{asset('public/StyleLinks/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/StyleLinks/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/chat/moment-2.2.1.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

        <!-- sweet alerts -->
        <script src="{{asset('public/StyleLinks/assets/sweet-alert/sweet-alert.min.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/sweet-alert/sweet-alert.init.js')}}"></script>

        <!-- flot Chart -->
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('public/StyleLinks/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

        <!-- Counter-up -->
        <script src="{{asset('public/StyleLinks/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/StyleLinks/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{asset('public/StyleLinks/js/jquery.app.js')}}"></script>

        <!-- Dashboard -->
        <script src="{{asset('public/StyleLinks/js/jquery.dashboard.js')}}"></script>

        <!-- Chat -->
        <script src="j{{asset('public/StyleLinks/s/jquery.chat.js')}}"></script>

        <!-- Todo -->
        <script src="{{asset('public/StyleLinks/js/jquery.todo.js')}}"></script>

        <script type="{{asset('public/StyleLinks/text/javascript')}}">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
    </div>
</body>
</html>
