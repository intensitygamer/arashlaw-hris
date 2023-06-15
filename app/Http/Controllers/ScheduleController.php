<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Employees;
use App\Models\Attendance;
use App\Models\User;



use App\Traits\AttendanceTrait;
use DateTime;

class ScheduleController extends Controller
{
    use AttendanceTrait;

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('salary.index');

    }

    public function view()
    {
        return view('salary.view');

    }
 
    public function save() {

        return view('salary.index');

    }
 
    public function agent_schedule_plotting(Request $request){

        $from_date      = $request->input('from_date') ?? date("Y-m-d");
        $to_date        = $request->input('to_date') ?? date("Y-m-d");
        
        $user_info      =  User::where('id', Auth::id())->first();
        $employee       =  Employees::where('user_id', Auth::id())->first();

        $schedule     = Attendance::whereBetween('attendance_date', [$from_date, $to_date])
                            ->where('employee_id', $employee->id)
                            ->orderBy('attendance_date', 'asc')
                            ->get();

        $schedule_arr = $this->get_schedule_plot_arr($schedule);
    

        $date1          = strtotime($from_date);
        $date2          = strtotime($to_date);
        $datediff       = $date2 - $date1;

        $days_diff_cnt =  round($datediff / (60 * 60 * 24));


        return view('schedule.agent_plotting')
                    ->with(compact('from_date', 'to_date', 'days_diff_cnt', 'schedule_arr', 'user_info', 'employee'));

    }
    

    public function my_schedule(Request $request){

        $from_date = $request->input('from_date') ?? '';

        $to_date = $request->input('to_date') ?? '';

        $date1          = strtotime($from_date);
        $date2          = strtotime($to_date);
        $datediff       = $date2 - $date1;
        
        $user_info      =  User::where('id', Auth::id())->first();
        $employee       =  Employees::where('user_id', Auth::id())->first();

        $schedule     = Attendance::whereBetween('attendance_date', [$from_date, $to_date])
                            ->where('employee_id', $employee->id)
                            ->orderBy('attendance_date', 'asc')
                            ->get();

        $days_diff_cnt =  round($datediff / (60 * 60 * 24));

        $schedule_arr = $this->get_schedule_plot_arr($schedule);

        return view('schedule.agent_plotting')
                    ->with(compact('from_date', 'to_date', 'days_diff_cnt', 'schedule_arr', 'user_info', 'employee'));

    }
    

    public function agent_plotting(Request $request){
        
        $from_date      = $request->input('from_date') ?? date("Y-m-d");
        $to_date        = $request->input('to_date') ?? date("Y-m-d");
        $employee_id    = $request->input('employee_id');

        $employee  =  Employees::where('record_status', 1);

        if($employee_id)
            $employee  =  $employee->where('id', $employee_id);
        
        $employee  = $employee->first();
 
        $days_diff_cnt  =  days_diff_cnt($from_date, $to_date);

        $user_info      =  User::where('id', Auth::id())->first();

        $schedule       = Attendance::whereBetween('attendance_date', [$from_date, $to_date]);

        
        if($employee_id)
            $schedule  = $schedule->where('id', $employee_id);
        
        $schedule  = $schedule->orderBy('attendance_date', 'asc')
                            ->get();

        //$schedule_arr   = $this->get_schedule_plot_arr($schedule);

        return view('schedule.agent')
                    ->with(compact('from_date', 'to_date', 'days_diff_cnt', 'schedule', 'employee', 'user_info'));

    }


    public function supervisor_plotting(Request $request){
        
        $employee_id    = $request->input('employee_id');
        $from_date      = $request->input('from_date') ?? date("Y-m-d");
        $to_date        = $request->input('to_date') ?? date("Y-m-d");


        $employees      =  Employees::where('record_status', 1);
            
        if($employee_id)
            $employees = $employees->where("id", 2);
        
        $employees=  $employees->get();


        $schedules     = Attendance::where('sched_status', 'pending')
                            ->where('employee_id', $employee_id)
                            ->whereBetween('attendance_date', [$from_date, $to_date])
                            ->orderBy('attendance_date', 'asc')
                            ->get();
 

        return view('schedule.supervisor_plotting')
                    ->with(compact('schedules', 'employees', 'from_date', 'to_date', 'employee_id'));
        
    }

    public function mass_update(Request $request){

        $attendance_index           = $request->input('attendance_index');
        $employees_ids              = $request->input('employees_ids');
        $employees_attendance_date  = $request->input('employees_attendance_date');
        $sched_time_in              = $request->input('sched_time_in');
        $sched_time_out             = $request->input('sched_time_out');

        //$attendance_arr  = array();
 

        for($cnt = 0; $cnt < $attendance_index; $cnt++){

            $sched_time_in_format = date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $sched_time_in[$cnt]));

            $sched_time_out_format = date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $sched_time_out[$cnt]));
            
            $time_in_hours = date("H", strtotime($sched_time_in[$cnt]));
            $time_out_hours = date("H", strtotime($sched_time_out[$cnt]));
            
            if($time_in_hours >= 16 && $time_out_hours <= 8){

                $sched_time_out_format = date("Y-m-d H:i:s", strtotime("+ 1 day", strtotime($sched_time_out_format)));


            }
 
            // $sched_time_in_format = date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $sched_time_in[$cnt]));
            // $sched_time_out_format = date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $sched_time_out[$cnt]));

            // $sched_time_in = date("Y-m-d H:i:s", strtotime($sched_time_in));
            // $sched_time_out = date("Y-m-d H:i:s", strtotime($sched_time_out));

            $attendance_arr[$cnt] = [   'sched_time_in'         => $sched_time_in_format, 
                                        'sched_time_out'        => $sched_time_out_format, 
                                        'attendance_date'       => $employees_attendance_date[$cnt], 
                                        'employee_id'           => $employees_ids[$cnt]];
                
            $attendance_insert  =  Attendance::updateOrInsert(

                    ['employee_id'  => $employees_ids[$cnt], 
                    'attendance_date' => $employees_attendance_date[$cnt]],

                    ['sched_time_in' => $sched_time_in_format, 
                    'sched_time_out' => $sched_time_out_format]

                );
    

        }


 
        return response(array('message' => "Schedule Sucessfully Updated!"), 200)
                        ->header('Content-Type', 'application/json');

        
    }

    public function update_agent_schedule(Request $request){

        
        $attendance_index           = $request->input('attendance_index');
        $employee_id                = $request->input('employee_id');
        $employees_attendance_date  = $request->input('employees_attendance_date');
        $sched_time_in              = $request->input('sched_time_in');
        $sched_time_out             = $request->input('sched_time_out');

         $attendance_arr  = array();
 

        for($cnt = 0; $cnt < $attendance_index; $cnt++){


            $sched_time_in_format = date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $sched_time_in[$cnt]));
            $sched_time_out_format = date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $sched_time_out[$cnt]));

            $attendance_arr[$cnt] = [   'sched_time_in'         => $sched_time_in_format, 
                                        'sched_time_out'        => $sched_time_out_format, 
                                        'attendance_date'       => $employees_attendance_date[$cnt], 
                                        'employee_id'           => $employee_id];
                
            $attendance_insert  =  Attendance::updateOrInsert(

                    ['employee_id'  => $employee_id, 
                    'attendance_date' => $employees_attendance_date[$cnt]],

                    ['sched_time_in' => $sched_time_in_format, 
                    'sched_time_out' => $sched_time_out_format]

                );


        }


        return response(json_encode($attendance_arr))
                        ->header('Content-Type', 'application/json');

        
    }


}
