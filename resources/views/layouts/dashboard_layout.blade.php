<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Agents Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
        
                <div class="user">
                    <div class="photo">
                        <div class="fa fa-user" style="width: 100%; height: 100%"></div>
                    </div>
                    <div class="info ">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>{{ Auth::user()->name }} <br> ({{ Auth::user()->role_id === 1 ? "Admin" : "User" }})</span>
                        </a>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item " id="dashboard">
                        <a class="nav-link" href="{{route('dashboard.index')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @if(Auth::user()->role_id === 1)
                    <li class="nav-item" id="user-management">
                        <a class="nav-link" data-toggle="collapse" href="#user-management-collapse">
                            <i class="nc-icon nc-satisfied"></i>
                            <p>
                                User Management
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="user-management-collapse">
                        <ul class="nav">
                                <li class="nav-item " id="roles">
                                    <a class="nav-link" href="{{route('roles.index')}}">
                                        <span class="sidebar-mini">R</span>
                                        <span class="sidebar-normal">Roles</span>
                                    </a>
                                </li>
                                <li class="nav-item " id="users">
                                    <a class="nav-link" href="{{route('users.index')}}">
                                        <span class="sidebar-mini">U</span>
                                        <span class="sidebar-normal">Users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li class="nav-item" id="expanse-management">
                        <a class="nav-link" data-toggle="collapse" href="#expanse-management-collapse">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>
                                Expense Management
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="expanse-management-collapse">
                            <ul class="nav">
                                @if(Auth::user()->role_id === 1)
                                <li class="nav-item " id="expense-categories">
                                    <a class="nav-link" href="{{route('expense-categories.index')}}">
                                        <span class="sidebar-mini">EC</span>
                                        <span class="sidebar-normal">Expense Categories</span>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item " id="expenses">
                                    <a class="nav-link" href="{{route('expenses.index')}}">
                                        <span class="sidebar-mini">E</span>
                                        <span class="sidebar-normal">Expenses</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-primary btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"> Welcome to Expense Manager </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <a class="navbar-brand" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav>
                        <p class="copyright text-center">
                         By Dave Paul C. Garcia
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
<div id="showmodal"></div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!--  jVector Map  -->
<script src="../../assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/plugins/moment.min.js"></script>
<!--  DatetimePicker   -->
<script src="../../assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  Sweet Alert  -->
<script src="../../assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="../../assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
<!--  Sliders  -->
<script src="../../assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="../../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="../../assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Bootstrap Table Plugin -->
<script src="../../assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="../../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<script src="../../assets/js/plugins/fullcalendar.min.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
     
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
        modal();
    });
    function modal() {
    $('.modaltoggle').bind('click', function () {
        var type = $(this).data('type');
            $("#showmodal").html('<div class="modal fade" id="myModal" role="dialog">' +
                '<div class="modal-dialog ' + type + '">' +
                '<div class="modal-content">' +
                '<div id = "show"></div>' +
                '</div>' +
                '</div>' +
                '</div>');
            $(this).attr('data-target', '#myModal');
            $(this).attr('data-toggle', 'modal');

        var href    = $(this).data('href');
        $('#show').html("<div style='padding-bottom: 50px; padding-top: 50px;text-align: center'><i class='fa fa-circle-o-notch fa-spin' style='width: 100%;font-size:60px; color:#87CB16'></i></div>");
        $.ajax({
            method: "GET",
            url: href,
            data: null,
            success: function (html) {
                $('#show').html(html);
            },
            error: function (jqXHR, textStatus, errorThrown){
              $('#show').html('<div style=\'padding-bottom: 50px; padding-top: 50px;text-align: center\'>' +
                  '<div  class="alert alert-warning">\n' +
                  '<span>\n' +
                  '    <b> Something Went Wrong - </b> Please Check your Internet Connection' +
                  '</span>\n' +
                  '</div>'+'</div>')
                }
            });
        });
    }
</script>
@yield('scripts')
</html>