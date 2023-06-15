<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;
use App\Models\Attendance;
use App\Models\Departments;

use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index(){
        
        $employee_id = session()->get('employee_id');

        $view_data = array();

        $view_data['current_week_schedule'] = Attendance::whereBetween('attendance_date', 
                                    [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                    ->where('employee_id', $employee_id)
                                    ->get();


        $view_data['current_attendance'] = Attendance::where('employee_id', $employee_id)
                                            ->where('sched_time_in', '<=', date("Y-m-d H:i:s", strtotime("+2 hour")))
                                            ->where('sched_time_out', '>=', date("Y-m-d H:i:s", strtotime("-4 hour")))
        //                                        ->whereDate('attendance_date', '=', Carbon::today())
                                            ->first();

        $view_data['departments']   = Departments::where('record_status', 1)->get();

        $view_data['employee_info'] = Employees::where('id', $employee_id)
                                    ->first();                                    
        
        return view('dashboard.index')
                ->with($view_data);

    }


 
}

