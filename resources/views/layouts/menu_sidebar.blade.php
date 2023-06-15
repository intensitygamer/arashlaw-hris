

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="" alt="">Arash Law- HRIS</a>
        </div>

        <div id="main-menu" class="main-menu navbar-collapse collapse">
            
            <ul class="nav navbar-nav">

<!--  
                <li class="active mt-4">
                    <p> Hello My Name is <span class="text text-info"> {{ session()->get('employee_name') }} </span> !  
                    </p> 
                </li> -->

                <h3 class="menu-title">Loggin in as: <span class="text text-info"> {{ session()->get('employee_name') }} </span>  </h3> 

                <!-- Dashboard -->

                <li class="menu-item-has-children dropdown @if(routes_compare_list($routes['dashboard'])) {{ 'show' }} @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-dashboard"></i> Dashboard</a>
                   
                    <ul class="sub-menu children dropdown-menu  @if(routes_compare_list($routes['dashboard'])) {{ 'show' }} @endif">
                      
                        <li><i class="menu-icon fa fa-dashboard"></i><a href="{{ route('dashboard') }}"> Attendance Dashboard  </a></li>
                        <li><i class="ti-dashboard"></i><a href="{{ route('attendance.employee_monitoring') }}"> Attendance Log Monitoring </a></li>

                        <!-- <li><i class="fa fa-user-plus"></i><a href="{{ route('employees.add') }}">Create New</a></li> -->

                    </ul>

                </li>

                <!-- Employees -->

                @can('Admin')

                    <li class="menu-item-has-children dropdown @if(routes_compare_list($routes['employees'])) {{ 'show' }} @endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon ti ti-user"></i>Employees</a>
                    
                        <ul class="sub-menu children dropdown-menu @if(routes_compare_list($routes['employees'])) {{ 'show' }} @endif">
                        
                            <li><i class="fa fa-list"></i><a href="{{ route('employees') }}">List</a></li>

                            <!-- <li><i class="fa fa-user-plus"></i><a href="{{ route('employees.add') }}">Create New</a></li> -->
    

                        </ul>

                    </li>

                @endcan
                <!-- Users -->

                <li class="menu-item-has-children dropdown  @if(routes_compare_list($routes['users']))  {{ 'show' }} @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon ti ti-user"></i>Users</a>
                   
                    <ul class="sub-menu children dropdown-menu @if(routes_compare_list($routes['users'])) {{ 'show' }} @endif">
                      
                        <li><i class="fa fa-list"></i><a href="{{ route('users') }}">List</a></li>

                        <!-- <li><i class="fa fa-user-plus"></i><a href="{{ route('employees.add') }}">Create New</a></li> -->
 

                    </ul>

                </li>

                <!-- Recruitment -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i> Applicants</a>
                   
                    <ul class="sub-menu children dropdown-menu">
                        
                        <li><i class="ti ti-user"></i><a href="#">Candidates</a></li>
                        <li><i class="fa fa-clipboard"></i><a href="#">Applicants</a></li>
                        <li><i class="fa fa-folder-open"></i><a href="#">Job Offers</a></li>

                    </ul>

                </li>
                
                <!-- Attendance -->
                
                <li class="menu-item-has-children dropdown @if(routes_compare_list($routes['attendance'])) {{ 'show' }} @endif">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-clock-o"></i>Attendance</a>
                   
                        <ul class="sub-menu children dropdown-menu @if(routes_compare_list($routes['attendance'])) {{ 'show' }} @endif">
                            <!-- <li><i class="fa fa-table"></i><a href="{{ route('attendance.current_shift') }}"> Today's Attendance Sheet </a></li> -->
                            <li><i class="fa fa-clock-o"></i><a href="{{ route('attendance') }}"> Attendance Sheet </a></li>
                            <li><i class="ti-clipboard "></i><a href="{{ route('attendance.employee') }}"> Employee Attendance Sheet (DTR) </a></li>

                        </ul>
                    
                    </a>

                </li>
                 
                <!-- Schedule -->

                <li class="menu-item-has-children dropdown @if(routes_compare_list($routes['schedule'])) {{ 'show' }} @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-calendar"></i>Schedules</a>
                    <ul class="sub-menu children dropdown-menu  @if(routes_compare_list($routes['schedule']))  {{ 'show' }} @endif">
                        <li><i class="ti-calendar"></i><a href="{{ route('schedule.my_schedule') }}"> My Schedule </a></li>
                        <li><i class="fa fa fa-calendar"></i><a href="{{ route('schedule.agent_plotting') }}"> Agent Schedule Plotting </a></li>
                        <li><i class="fa fa-table"></i><a href="{{ route('schedule.supervisor_plotting') }}"> Supervisor Schedule Plotting </a></li>

                    </ul>
                </li>
               
                <!-- Work Shifts -->

                <li class="menu-item-has-children dropdown  @if(routes_compare_list($routes['work_shifts']))   {{ 'show' }} @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-calendar"></i>Work Shifts</a>
                    <ul class="sub-menu children dropdown-menu  @if(routes_compare_list($routes['work_shifts'])) {{ 'show' }} @endif">
                        <li><i class="fa fa fa-calendar"></i><a href="{{ route('work_shifts') }}"> List </a></li>
                        <li><i class="fa fa-plus"></i><a href="{{ route('work_shifts') }}"> Create Work Shift </a></li>
                    </ul>
                </li>
               

                <!-- Departments -->

                <li class="menu-item-has-children dropdown @if(request()->route()->named('departments')) {{ 'show' }} @endif">
                    <a href="{{ route('departments') }}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-building"></i>Departments</a>
                    <ul class="sub-menu children dropdown-menu @if(request()->route()->named('departments')) {{ 'show' }} @endif">
                        <li><i class="fa fa-building"></i><a href="{{ route('departments') }}"> List </a></li>

                        <li><i class="fa fa-plus"></i><a href="#"> Create New </a></li>
                    </ul>
                </li>
                

                <!-- Job Positions -->

                <li class="menu-item-has-children dropdown @if(request()->route()->named('job_positions')) {{ 'show' }} @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-briefcase"></i>Job Positions</a>
                    <ul class="sub-menu children dropdown-menu @if(request()->route()->named('job_positions')) {{ 'show' }} @endif">
                        <li><i class="ti-briefcase"></i><a href="{{ route('job_positions') }}"> List </a></li>

                        <li><i class="fa fa-plus"></i><a href="#"> Create New </a></li>
                    </ul>
                </li>


                <!-- Payroll -->

                <li class="menu-item-has-children dropdown @if(routes_compare_list($routes['payroll'])) {{ 'show' }} @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Payroll</a>
                    <ul class="sub-menu children dropdown-menu @if(routes_compare_list($routes['payroll']))  {{ 'show' }} @endif">

                        <li><i class="fa fa-table"></i><a href="{{ route('payroll') }}"> Payroll List </a></li>

                        <li><i class="fa fa-plus"></i><a href="{{ route('payroll.create_form'   ) }}"> Create Payroll </a></li>

                        <li><i class="fa fa-list"></i><a href="{{ route('payroll.headers') }}"> Payroll Headers </a></li>

                        <li><i class="fa fa-list"></i><a href="{{ route('sss_contribution_table') }}"> SSS Contribution Table </a></li>


                    </ul>
                </li>
                 

                <!-- Salary -->

                
                <li class="menu-item-has-children dropdown  @if(in_array(request()->route()->getName(), $routes['salary'])) {{ 'show' }} @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>Salary</a>
                    <ul class="sub-menu children dropdown-menu @if(in_array(request()->route()->getName(), $routes['salary']))  {{ 'show' }} @endif">
                        <li><i class="fa fa-list"></i><a href="{{ route('salary') }}"> Salary List </a></li>
                    </ul>
                </li>
                 


            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>