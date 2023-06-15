<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\JobPositionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\WorkingShiftController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SSSContributionController;
 

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function(){

    Route::prefix('/')->group(function(){

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); //->middleware('auth');

        Route::get('/', [DashboardController::class, 'index'])->name('index');


    });


    Route::prefix('/attendance')->group(function(){
        
        Route::get('/', [AttendanceController::class, 'index'])->name('attendance');

        Route::post('/mass_update', [AttendanceController::class, 'mass_update'])->name('attendance.mass_update');

        Route::post('/update', [AttendanceController::class, 'update'])->name('attendance.update');

        Route::get('/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
    
        Route::get('/current_shift', [AttendanceController::class, 'current_shift'])->name('attendance.current_shift');
    
        Route::get('/employee', [AttendanceController::class, 'employee_attendance'])->name('attendance.employee');

        //Route::get('/add', [AttendanceController::class, 'store'])->name('add');

        Route::post('/punch_in', [AttendanceController::class, 'punch_in'])->name('attendance.punch_in');

        Route::get('/employee_monitoring', [AttendanceController::class, 'employee_monitoring'])->name('attendance.employee_monitoring');
         
        Route::get('/retrieve_employee_monitoring', [AttendanceController::class, 'retrieve_employee_monitoring'])->name('attendance.retrieve_employee_monitoring');
       
        Route::get('/retrieve_current_week_schedule', [AttendanceController::class, 'retrieve_current_week_schedule'])->name('attendance.retrieve_current_week_schedule');


    });

    Route::prefix('/schedule')->group(function(){
        
        Route::get('/', [ScheduleController::class, 'index'])->name('schedule');
        
        Route::get('/agent_schedule_plotting', [ScheduleController::class, 'agent_schedule_plotting'])->name('schedule.agent_plotting');

        Route::get('/supervisor_plotting', [ScheduleController::class, 'supervisor_plotting'])->name('schedule.supervisor_plotting');

        Route::post('/mass_update', [ScheduleController::class, 'mass_update'])->name('schedule.mass_update');

        Route::post('/update_agent_schedule', [ScheduleController::class, 'update_agent_schedule'])->name('agent.schedule.update');

        Route::get('/my_schedule', [ScheduleController::class, 'my_schedule'])->name('schedule.my_schedule');

    });


    Route::prefix('/employees')->group(function(){
        
        Route::get('/', [EmployeesController::class, 'index'])->name('employees');
        
        Route::get('/add', [EmployeesController::class, 'add'])->name('employees.add');
    
        Route::post('/create', [EmployeesController::class, 'save'])->name('employee.create');

        Route::post('/update', [EmployeesController::class, 'update'])->name('employee.update');

        Route::get('/terminate', [EmployeesController::class, 'terminate'])->name('employees.terminate');

        Route::get('/retrieve', [EmployeesController::class, 'retrieve_info'])->name('employee_info.retrieve');
        
    });

    Route::prefix('/users')->group(function(){

        Route::get('/', [UsersController::class, 'index'])->name('users');

        Route::post('/add', [UsersController::class, 'save'])->name('users.add');
        
        Route::post('/profile_update', [UsersController::class, 'save'])->name('users.profile.update');
        
    });


    Route::prefix('/departments')->group(function(){
        
        Route::get('/', [DepartmentsController::class, 'index'])->name('departments');
        
        //Route::get('/add', [AttendanceController::class, 'store'])->name('add');
    
    });

    Route::prefix('/work_shifts')->group(function(){
        
        Route::get('/', [WorkingShiftController::class, 'index'])->name('work_shifts');
        
        Route::post('/add', [WorkingShiftController::class, 'store'])->name('work_shift.add');
    
    });



    Route::prefix('/job_positions')->group(function(){
        
        Route::get('/', [JobPositionsController::class, 'index'])->name('job_positions');
        
        //Route::get('/add', [AttendanceController::class, 'store'])->name('add');
    
    });


    Route::prefix('/payroll')->group(function(){
        
        Route::get('/',             [PayrollController::class, 'index'])->name('payroll');

        
        Route::get('/create_form',  [PayrollController::class, 'create_form'])->name('payroll.create_form');

        Route::post('/create',      [PayrollController::class, 'create'])->name('payroll.create');

        Route::any('/edit',      [PayrollController::class, 'edit_payroll'])->name('payroll.edit');

        Route::post('/delete',      [PayrollController::class, 'delete'])->name('payroll.delete');
        
        Route::post('/publish',      [PayrollController::class, 'publish'])->name('payroll.publish');
        
        Route::post('/generate',   [PayrollController::class, 'generate'])->name('payroll.generate');
        
        
        Route::get('/headers',   [PayrollController::class, 'headers'])->name('payroll.headers');

        Route::post('/create_headers',   [PayrollController::class, 'create_headers'])->name('payroll.create_headers');
        
        //Route::get('/add', [AttendanceController::class, 'store'])->name('add');
    
    });

    Route::prefix('/sss_contribution_table')->group(function(){

        Route::get('/',   [SSSContributionController::class, 'index'])->name('sss_contribution_table');


    });


    Route::prefix('/salary')->group(function(){
        
        Route::get('/',         [SalaryController::class, 'index'])->name('salary');

        Route::any('/print',     [SalaryController::class, 'print'])->name('salary.print');
        
        Route::get('/view',     [SalaryController::class, 'view'])->name('salary.view');
        
        Route::get('/retrieve',     [SalaryController::class, 'retrieve'])->name('salary.retrieve');

        Route::post('/save',     [SalaryController::class, 'update'])->name('salary.save');

        Route::get('/retrieve_employee',     [SalaryController::class, 'retrieve_payroll'])->name('salary.retrieve_employee_payroll');

    });

    Route::get('/logout',             [LoginController::class, 'logout'])->name('logout');

});

//* Router Login

Route::prefix('/login')->group(function(){
        
    Route::get('/',             [LoginController::class, 'login_form'])->name('login');

    Route::post('/',             [LoginController::class, 'login']);

});

