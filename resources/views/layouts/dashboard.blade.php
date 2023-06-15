    <!doctype html>
    
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="w-100 h-100">
        
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content="Intenzitia - Payroll">

        <title>Arash Law - HRIS </title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        
        <link rel="stylesheet" href="{{ asset('sufee/vendors/bootstrap/dist/css/bootstrap.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('sufee/vendors/font-awesome/css/font-awesome.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('sufee/vendors/themify-icons/css/themify-icons.css') }}" />

        <link rel="stylesheet" href="{{ asset('sufee/vendors/flag-icon-css/css/flag-icon.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('sufee/vendors/selectFX/css/cs-skin-elastic.css') }}" />

        <link rel="stylesheet" href="{{ asset('sufee/vendors/jqvmap/dist/jqvmap.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('sufee/assets/css/style.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('sufee/vendors/chosen/chosen.min.css') }}">

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- 
      
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css"> -->


        @php 
    
        //* Add Route Names Here 
    
            $routes = array();
    
            $routes['schedule']     = array('schedule.agent_plotting', 'agent.plotting', 'schedule.supervisor_plotting', 'schedule.my_schedule');
    
            $routes['attendance']   = array('attendance.employee', 'attendance.edit', 'attendance');
    
            $routes['dashboard']    = array('dashboard', 'attendance.employee_monitoring');
    
            $routes['employees']    = array('employees', 'employees.add');
    
            $routes['users']        = array('users');
    
            $routes['work_shifts']  = array('work_shifts');
    
            $routes['payroll']      = array('payroll', 'payroll.create_form', 'payroll.create', 'payroll.headers', 'payroll.edit');
    
            $routes['salary']       = array('salary');

     
        @endphp 

        @if(request()->route()->named('employees') || request()->route()->named('employees')) 
           
            <link rel="stylesheet" href="{{ asset('css/employee.css') }}" />

        @endif 


        @if(routes_compare_list($routes['attendance'])) 
           
            <link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
            <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">  -->
        @endif 

        @if(routes_compare_list($routes['schedule'])) 

            <link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />

        @endif 

        @if(routes_compare_list($routes['payroll'])) 

           
            <link rel="stylesheet" href="{{ asset('css/payroll-create.css') }}" />

        @endif 

        @if(request()->route()->named('dashboard') ) 

            <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />

        @endif 

        @if(request()->route()->named('attendance.employee_monitoring') ) 

            <link rel="stylesheet" href="{{ asset('css/attendance.employee_monitoring.css') }}" />

        @endif 
        
        <script src="{{ asset('sufee/vendors/jquery/dist/jquery.min.js') }}"></script>

    </head>

    <!-- 

    <script src="{{ asset('sufee/vendors/bootstrap/js/dist/modal.js') }}"></script> -->


    <body>

        @include('layouts.menu_sidebar')

        <div id="right-panel" class="right-panel">

            <!-- Header-->
            <header id="header" class="header">
    
                <div class="header-menu">
    
                    <div class="col-sm-7">  
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <div class="header-left">
    
                            <div class="dropdown for-notification">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="count bg-danger">5</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="notification">
                                    <p class="red">You have 3 Notification</p>
                                    <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                    <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                    <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                                </div>
                            </div>
    
                            <div class="dropdown for-message">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-email"></i>
                                    <span class="count bg-primary">9</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="message">
                                    <p class="red">You have 4 Mails</p>
                                    <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <span class="photo media-left"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                            <p>Hello, this is an example msg</p>
                                    </span>
                                </a>
                                    <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <span class="photo media-left"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </span>
                                </a>
                                    <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <span class="photo media-left"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                            <p>Hello, this is an example msg</p>
                                    </span>
                                </a>
                                    <a class="dropdown-item media bg-flat-color-3" href="#">
                                    <span class="photo media-left"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </span>
                                </a>
                                </div>                            
                                

                            </div>
                        </div>                                
                        

                    </div>

                    <div class="col col-sm-2">
                        <div class="row">
                         Break: <span class="text text-danger punch-timer ms-4" style="padding-left: 15px"> 25:00:00 </span>
                        </div>
                    </div>
                    
                    <div class="col col-sm-5">
                     
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <img class="user-avatar rounded-circle" src="{{ asset('images/user-profile.png') }}" alt="User Avatar">
                            </a>
    
                            <div class="user-menu dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-88px, 0px, 0px);">
                                <!-- <a class="nav-link" data-toggle="modal" data-target="#editUserProfileModal" href="#">
                                    <i class="fa fa-user"></i> My Profile</a> -->
<!--     
                                <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>
    
                                <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a> -->
    
                                <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                            </div>

                        </div>
     
                    </div>
     
    
                        
                </div>
                
                <div id="loader-spinner">
            
                    <img src="{{ asset('images/loading2.gif')}}" />
        
                </div>
        
            </header><!-- /header -->
            <!-- Header-->
      
            @yield('content')
  
            
        </div>


        <!-- <script src="{{ asset('sufee/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script> -->
        <!-- <script src="{{ asset('sufee/assets/js/dashboard.js') }}"></script> -->
        <!-- <script src="{{ asset('sufee/assets/js/widgets.js') }}"></script>
        <script src="{{ asset('sufee/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('sufee/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
 -->

        <script>  

            var attendance_punch_in_url         = "{{ route('attendance.punch_in') }}"; 
            var retrieve_employee_monitoring    = "{{ route('attendance.retrieve_employee_monitoring') }}"; 


            var retrieve_current_week_schedule  = "{{ route('attendance.retrieve_current_week_schedule') }}"; 
            var salary_retrieve_url             = "{{ route('salary.retrieve') }}"; 
            var employee_info_retrieve_url      = "{{ route('employee_info.retrieve') }}"; 

            var emp_salary_retrieve_url         = "{{ route('salary.retrieve_employee_payroll') }}";

        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript" src="{{ asset('vendor/dayjs.min.js') }}"></script> 
        <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/utc.js"></script>
        <script>dayjs.extend(window.dayjs_plugin_utc)</script>


        
        <script src="{{ asset('sufee/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('sufee/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        

        


        <script src="{{ asset('sufee/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('sufee/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('sufee/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>


        <script src="{{ asset('sufee/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('sufee/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('sufee/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        <script src="{{ asset('sufee/vendors/popper.js/dist/umd/popper.min.js') }}"></script>

        <script src="{{ asset('js/main.js') }}"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="{{ asset('sufee/vendors/chosen/chosen.jquery.min.js') }}"></script>

        <script>
            jQuery(document).ready(function() {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
        </script>

        <script type="text/javascript" src="{{ asset('js/globals.js') }}"></script>
 
        
        <script type="text/javascript" src="{{ asset('js/helper.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/custom-form-submitter.js') }}"></script> 
        
        @if(request()->route()->named('attendance.employee_monitoring')) 

            <script type="text/javascript" src="{{ asset('js/attendance_employee_monitoring.js') }}"></script> 

            <!-- {{ asset('js/employees.js') }} -->

        @endif

        @if(request()->route()->named('employees') || request()->route()->named('attendance.employee') ||  request()->route()->named('attendance.edit') ) 

            <script type="text/javascript" src="{{ asset('js/employees.js') }}"></script> 

        @endif
        
        @if(routes_compare_list($routes['attendance'])) 

            <script type="text/javascript" src="{{ asset('js/attendance.js') }}"></script> 

        @endif

        @if(routes_compare_list($routes['schedule']))  

            <script type="text/javascript" src="{{ asset('js/schedule.js') }}"></script> 

        @endif

        @if(routes_compare_list($routes['payroll'])) 

            <script type="text/javascript" src="{{ asset('js/payroll.js') }}"></script> 

            <script type="text/javascript" src="{{ asset('js/emp_salary.js') }}"></script> 

        @endif

        @if(request()->route()->named('payroll.edit'))

        <script> var payroll_id = {{ request()->input('payroll_id') }}   </script>

        @endif

        @if(request()->route()->named('payroll.create') || request()->route()->named('payroll.edit') || request()->route()->named('payroll')) 


        <script type="text/javascript" src="{{ asset('js/payroll_create.js') }}"></script> 

        <script type="text/javascript" src="{{ asset('js/payroll-calculator.js') }}"></script> 

        @endif

        @if(request()->route()->named('payroll.headers') ) 

            <script type="text/javascript" src="{{ asset('js/payroll-headers.js') }}"></script> 

        @endif


        
        @if(request()->route()->named('dashboard') || request()->route()->named('dashboard')) 

            <script type="text/javascript" src="{{ asset('js/punch.js') }}"></script> 

        @endif
 
        @include('users.modals.edit_profile')

    </body>


</html>
