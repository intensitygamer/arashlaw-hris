<?php

namespace App\Traits;

use Illuminate\Http\Request;

use App\Models\Attendance;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

trait AttendanceTrait {
 
    public function get_attendance_arr($attendance){


        $attendance_arr = array();


        foreach($attendance as $attendance_row){

            $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['time_in'] = $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['time_out']  = '';
           
            if($attendance_row->time_in != NULL)
                $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['time_in']         = date("H:i", strtotime($attendance_row->time_in)); //date("H:i:s", strtotime($attendance_row->time_in)) ?? '';

            if($attendance_row->time_out != NULL)
                $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['time_out']        = date("H:i", strtotime($attendance_row->time_out)); //date("H:i:s", strtotime($attendance_row->time_out)) ?? '';

            // $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['time_in']         = date("H:i:s", strtotime($attendance_row->time_in));
            // $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['time_out']        = date("H:i:s", strtotime($attendance_row->time_out));
            $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['attendance_date'] =  $attendance_row->attendance_date;
            
        }

        return $attendance_arr;

    }

    public function get_schedule_plot_arr($attendance){


        $attendance_arr = array();


        foreach($attendance as $attendance_row){

            $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['sched_time_out'] = $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['sched_time_in'] = '';
            if($attendance_row->sched_time_in != NULl)
                $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['sched_time_in'] =  Carbon::parse($attendance_row->sched_time_in)->format('H:i:s');
          
            if($attendance_row->sched_time_out != NULl)
                $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['sched_time_out'] = Carbon::parse($attendance_row->sched_time_out)->format('H:i:s'); 

            $attendance_arr[$attendance_row->attendance_date][$attendance_row->employee_id]['attendance_date'] = $attendance_row->attendance_date;
            

        }

        return $attendance_arr;

    }

    public function get_employee_attendance_arr($attendance){


        $attendance_arr = array();


        foreach($attendance as $attendance_row){

            if($attendance_row->time_in != NULl)

                $attendance_arr[$attendance_row->employee_id]['time_in']         = date("H:i", strtotime($attendance_row->time_in));

            if($attendance_row->time_out != NULl)

                $attendance_arr[$attendance_row->employee_id]['time_out']        = date("H:i", strtotime($attendance_row->time_out));

            $attendance_arr[$attendance_row->employee_id]['attendance_date'] = $attendance_row->attendance_date;
            

        }

        return $attendance_arr;

    }

 
}
