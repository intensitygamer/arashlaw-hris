<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;
use App\Models\Attendance;
use App\Models\Departments;

use App\Traits\AttendanceTrait;

use Carbon\Carbon;

use Auth;

class AttendanceController extends Controller{

    use AttendanceTrait;

    public function index(Request $request){


        $from_date      = $request->input('from_date') ?? date("Y-m-d");
        $to_date        = $request->input('to_date') ?? date("Y-m-d");
        
        $employees      =  Employees::where('record_status', 1)->get();

        $attendance     = Attendance::whereBetween('attendance_date', [$from_date, $to_date])
                            ->orderBy('employee_id')
                            ->orderBy('attendance_date', 'asc')
                            ->get();

        $attendance_arr = $this->get_attendance_arr($attendance);
  
        
        
        $date1          = strtotime($from_date);
        $date2          = strtotime($to_date);
        $datediff       = $date2 - $date1;

        $days_diff_cnt =  round($datediff / (60 * 60 * 24));


        return view('attendance.index')
                ->with(compact('from_date', 'to_date', 'employees', 'attendance_arr', 'days_diff_cnt', 'attendance'));

    }



    public function current_shift(Request $request){

    }


    public function mass_update(Request $request){

        $attendance_index           = $request->input('attendance_index');
        $employees_ids              = $request->input('employees_ids');
        $employees_attendance_date  = $request->input('employees_attendance_date');
        $time_in                    = $request->input('time_in');
        $time_out                   = $request->input('time_out');

        //$attendance_arr  = array();


        for($cnt = 0; $cnt < $attendance_index; $cnt++){

            // $time_in_val    = ($time_in[$cnt]  != '') ? Carbon::parse(strtotime($employees_attendance_date[$cnt] . ' '. $time_in[$cnt]))->format("Y-m-d H:i:s") : NULL;
            // $time_out_val   = ($time_out[$cnt]  != '') ? Carbon::parse(strtotime($employees_attendance_date[$cnt] . ' '. $time_out[$cnt]))->format("Y-m-d H:i:s") : NULL;
 
            $time_in_val    = ($time_in[$cnt]  != '') ?  date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $time_in[$cnt])) : NULL; //($time_in[$cnt]  != '') ? date("Y-m-d h:i") : '';
            $time_out_val   = ($time_out[$cnt]  != '') ? date("Y-m-d H:i:s", strtotime($employees_attendance_date[$cnt] . ' '. $time_out[$cnt])) : NULL; //($time_out[$cnt]  != '') ? date("Y-m-d h:i") : '';
            
           // $time_out_val   = ($time_out[$cnt]  != '') ? Carbon::parse(strtotime($employees_attendance_date[$cnt] . ' '. $time_out[$cnt]))->format("Y-m-d H:i") : '';
 
            $attendance_insert  =  Attendance::updateOrInsert(

                    ['employee_id'  => $employees_ids[$cnt], 
                    'attendance_date' => $employees_attendance_date[$cnt]],

                    ['time_in' => $time_in_val, 
                    'time_out' => $time_out_val]

                );


        }


        // $attendance_arr[$cnt] = [   'time_in'           => $time_in[$cnt], 
        //                             'time_out'          => $time_out[$cnt], 
        //                             'attendance_date'   => $employees_attendance_date[$cnt], 
        //                             'employee_id'       => $employees_ids[$cnt]];
            
        return response(array('message' => "Attendance Sucessfully Updated!"), 200)
                        ->header('Content-Type', 'application/json');
        
    }

    public function edit(Request $request){


        $from_date      = $request->input('from_date') ?? date("Y-m-d");
        $to_date        = $request->input('to_date') ?? date("Y-m-d");
        
        $employees      =  Employees::where('record_status', 1)->get();

        $attendance     = Attendance::whereBetween('attendance_date', [$from_date, $to_date])
                            ->orderBy('employee_id')
                            ->orderBy('attendance_date', 'asc')
                            ->get();

        $attendance_arr = $this->get_attendance_arr($attendance);
  
        
        
        $date1          = strtotime($from_date);
        $date2          = strtotime($to_date);
        $datediff       = $date2 - $date1;

        $days_diff_cnt =  round($datediff / (60 * 60 * 24));


        return view('attendance.edit')
                ->with(compact('from_date', 'to_date', 'employees', 'attendance_arr', 'days_diff_cnt', 'attendance'));

    }


    public function employee_attendance(Request $request){

        $from_date      = $request->input('from_date') ?? date("Y-m-d");
        $to_date        = $request->input('to_date') ?? date("Y-m-d");
        $departments    = Departments::where('record_status', 1)->get();
        $employees      = Employees::where('record_status', 1)->get();

        $employee_id    = $request->input('employee_id') ?? '';
        $department_id  = $request->input('department_id') ?? '';

        // $attendance     = Attendance::whereBetween('attendance_date', [$from_date, $to_date])

        //$attendance     = Attendance::where('employee_id', $employee_id);
        //$attendance     = Attendance::where('department_id', $department_id);

        $attendance     = Attendance::orderBy('employee_id')
                            ->orderBy('attendance_date', 'asc')
                            ->get();


        $attendance_arr = $this->get_employee_attendance_arr($attendance);

        // print_r($attendance_arr);
        
        // exit;

        return view('attendance.employee')
            ->with(compact('from_date', 'to_date', 'departments', 'employees', 'attendance_arr'));

    }

    public function punch_in(Request $request){

        //$employee_id    = Auth::id();

        $employee_id    =  $request->session()->get('employee_id');

        
        $attendance_id  = $request->input('attendance_id');
        
        $attendance     = Attendance::where('id', $attendance_id)
                                    // ->whereDate('sched_time_in', )
                                    // ->whereDate('attendance_date', '=', Carbon::today())
                                    ->first();

        $punch_time = Carbon::now()->toDateTimeString();

        if($request->input('clock_in')){
            $last_attendance_log = "Clock In";
            $attendance->time_in = $punch_time; 
        }


        if($request->input('lunch_in')){
            $last_attendance_log = "Lunch";
            $attendance->lunch_in = $punch_time; 
        }

        if($request->input('lunch_out')){
            $last_attendance_log = "Back (Lunch)";
            $attendance->lunch_out = $punch_time; 
        }

        if($request->input('break1')){
            $last_attendance_log = "Break 1";
            $attendance->break1 = $punch_time; 
        }


        if($request->input('break1_back')){
            $last_attendance_log = "Back (Break 1)";
            $attendance->break1_back = $punch_time; 
        }

        if($request->input('break2')){
            $last_attendance_log = "Break 2";
            $attendance->break2 = $punch_time;
        }

        if($request->input('break2_back')){
            $last_attendance_log = "Back (Break 2)";
            $attendance->break2_back = $punch_time; 
        }

        if($request->input('clock_out')){
            $attendance->time_out = $punch_time; 
            $last_attendance_log = "Clock Out";
        }

        $attendance->save();

        $employee                       = Employees::where('id', $employee_id)->first();

 
        if($employee){

            $employee->last_attendance_log = $last_attendance_log;
            $employee->last_log_attendance_at  = $punch_time;

            $employee->save();
 
            $request->session()->put('employee', $employee);

        }


        if($attendance){

            return response(array('toastifyText'=> $last_attendance_log ), 200)                  
            ->header('Content-Type', 'application/json');
        }


    }

    public function employee_monitoring(Request $request){
        
        $employees      = Employees::where('record_status', 1)->get();
        $departments    = Departments::where('record_status', 1)->get();


        return view('attendance.employee_monitoring')
            ->with(compact('employees', 'departments'));

    }
 
    public function retrieve_employee_monitoring(Request $request){

        $employees      = Employees::where('record_status', 1)->get();
        $departments    = Departments::where('record_status', 1)->get();

        $employees_retrieved = array();
        
        $i = 0;

        foreach($employees as $employee){

            $employeeData[$i]['employee_no']         = $employee->id;
            $employeeData[$i]['employee_name']       = $employee->getFullName();
            $employeeData[$i]['last_attendance_log'] = "";
        
            if($employee->last_attendance_log)
                $employeeData[$i]['last_attendance_log'] = display_attendance_punch_status($employee->last_attendance_log). '<br> <span class="text "> <small>'.  date("h:i A", strtotime($employee->last_log_attendance_at)) .' </small> </span>';         
           
 

            $current_attendance = Attendance::where('employee_id', $employee->id)
                                        ->where('sched_time_in', '<=', date("Y-m-d H:i:s", strtotime("+2 hour")))
                                        ->where('sched_time_out', '>=', date("Y-m-d H:i:s", strtotime("-4 hour")))
                                        ->first();
            
            $employeeData[$i]['time_in'] = '1';
            $employeeData[$i]['time_in'] = time_formatter($current_attendance->time_in);
            $employeeData[$i]['break1'] = time_formatter($current_attendance->break1);
            $employeeData[$i]['break2'] = time_formatter($current_attendance->break2);
            $employeeData[$i]['lunch'] = time_formatter($current_attendance->lunch_in);
            $employeeData[$i]['time_out'] = time_formatter($current_attendance->time_out);
     
            $i++;

         }

        return response(json_encode($employeeData))
                    ->header('Content-Type', 'application/json');


    }


    public function retrieve_current_week_schedule(Request $request){

        $employee_id                =  session()->get('employee_id');

        $current_week_attendance    =  Attendance::whereBetween('attendance_date', 
                                            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->where('employee_id', $employee_id)
                                            ->orderBy('attendance_date', 'asc')
                                            ->get();

      
        $i = 0;

        foreach($current_week_attendance as $schedule){

            $attendanceData[$i]['id']        = $schedule->id;

            $attendanceData[$i]['attendance_date']      = attendance_date_formatter($schedule->attendance_date);
            $attendanceData[$i]['sched_time_in']        = time_formatter($schedule->sched_time_in);

            $attendanceData[$i]['lunch_time']           = time_formatter($schedule->lunch_in) . ' - '. time_formatter($schedule->lunch_out);
                    
            if($schedule->time_in)
                $attendanceData[$i]['sched_time_in']        .= ' (In:  '.time_formatter($schedule->time_in).')';

            $late_in_minutes = late_in_minutes($schedule->time_in, $schedule->sched_time_in);
 
            if($late_in_minutes > 15){
                
                $attendanceData[$i]['sched_time_in'] .= late_in_minutes_display($late_in_minutes);             
            }

            $attendanceData[$i]['sched_time_out']      = time_formatter($schedule->sched_time_out);

                
            if($schedule->time_out)
                $attendanceData[$i]['sched_time_out']        .= ' (Out:  '.time_formatter($schedule->time_out).')';

            $undertime_in_minutes = 0;

            if($schedule->time_in && $schedule->time_out)
                $undertime_in_minutes = undertime_in_minutes($schedule->time_out, $schedule->sched_time_out);
 
            if($undertime_in_minutes){

                $attendanceData[$i]['sched_time_out'] .= undertime_in_minutes_display($undertime_in_minutes);

            }

            $attendanceData[$i]['total_break_time']     = '-';

            $overbreak_in_minutes = 0;

            if($schedule->break1 || $schedule->break2){

                $total_break_in_minutes = total_break_in_minutes($schedule->break1, $schedule->break1_back, $schedule->break2, $schedule->break2_back);

                $attendanceData[$i]['total_break_time']     = max($total_break_in_minutes, 0). ' minutes';
  

                if($total_break_in_minutes > 30){

                    $overbreak_in_minutes =  $total_break_in_minutes - 30;
 
                }
                
                if($overbreak_in_minutes)
                    $attendanceData[$i]['total_break_time'] .= '<p class="text text-danger">'. $overbreak_in_minutes . ' minutes overbreak </p>';
            
            }

            $attendanceData[$i]['total_work_hours']     = '';

            if($schedule->time_in && $schedule->time_out)
                $attendanceData[$i]['total_work_hours']     = get_work_hours($schedule, 8, $late_in_minutes, $overbreak_in_minutes, $undertime_in_minutes) . ' h';
          
       
            $i++;
        
        }

        return response(json_encode($attendanceData))
                    ->header('Content-Type', 'application/json');


    }
}
