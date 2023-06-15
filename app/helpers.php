<?php 

use Carbon\Carbon;
use App\Models\Departments;
use App\Models\Employees;

if (! function_exists('enqueue_scripts')) {

    function enqueue_scripts(array $scripts){
 
        foreach($scripts as $script){
            echo "<script src='".$script."' type='text/javascript'></script>";
        }

    }
}

if (! function_exists('enqueue_styles')) {

    function enqueue_styles(array $styles){

        foreach($scripts as $script){
            echo "<script src='".$script."' type='text/javascript'/>";
            echo "<link href='".$styles."' rel='stylesheet'>";
        }

    }

if (! function_exists('convert_from_latin1_to_utf8_recursively')) {

      function convert_from_latin1_to_utf8_recursively($dat){

            if (is_string($dat)) {
            return utf8_encode($dat);
            } elseif (is_array($dat)) {
            $ret = [];
            foreach ($dat as $i => $d) $ret[ $i ] = convert_from_latin1_to_utf8_recursively($d);
    
            return $ret;
            } elseif (is_object($dat)) {
            foreach ($dat as $i => $d) $dat->$i = convert_from_latin1_to_utf8_recursively($d);
    
            return $dat;
            } else {
            return $dat;
            }
            
        }

    }

}

if (! function_exists('routes_compare_list')) {

    function routes_compare_list($route_list){

        return in_array(request()->route()->getName(), $route_list);
   
    }

}
 
if (! function_exists('default_datetime_from')) {

    function default_datetime_from(){

        
        if(time() >= strtotime("10:00PM") && time() <= strtotime("11:59PM"))
            return date("Y-m-d H:i:s", strtotime("10:00 PM"));
        else 
            return date("Y-m-d H:i:s", strtotime("- 1 day 10:00 PM"));

    }       

}

if (! function_exists('default_datetime_to')) {

    function default_datetime_to(){

        if(time() >= strtotime("10:00PM") && time() <= strtotime("11:59PM"))
            return date("Y-m-d H:i:s", strtotime("+ 1 day 7:00"));
        else
            return date("Y-m-d H:i:s", strtotime(" 7:00"));

    }

}

if (! function_exists('validateDate')){

    function validateDate($date, $format = 'Y-m-d H:i:s'){
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

}

if (! function_exists('days_diff_cnt')){

    function days_diff_cnt($from_date, $to_date){
    
        $date1          = strtotime($from_date);
        $date2          = strtotime($to_date);
        $datediff       = $date2 - $date1;

        $days_diff_cnt =  round($datediff / (60 * 60 * 24));

        return $days_diff_cnt;
    }

}

if (! function_exists('time_formatter')) {

    function time_formatter($date){

        return $date ?  Carbon::parse($date)->format('h:i A'): ''; 

    }
}


if (! function_exists('date_formatter')) {

    function date_formatter($date){

        return $date ?  Carbon::parse($date)->format('M d, Y'): ''; 

    }
}



if (! function_exists('attendance_date_formatter')) {

    function attendance_date_formatter($date){

        return $date ?  Carbon::parse($date)->format('(D) M d, Y'): ''; 

    }
}

if (! function_exists('is_today')) {

    function is_today($date){

        return (Carbon::now() == Carbon::parse($date));

    }
}

if (! function_exists('isPast')) {

    function isPast($time)
    {
        return (strtotime($time) < time());
    }
}

if (! function_exists('isFuture')) {

    function isFuture($time)
    {
        return (strtotime($time) > time());
    }
}

if (! function_exists('late_in_minutes')) {

    function late_in_minutes($time_in, $sched_time_in){
        
        $late_in_minutes =  floor((strtotime($time_in) - strtotime($sched_time_in)) / 60 );

        if($late_in_minutes > 15){

            return $late_in_minutes;

        }
        
        return false;

        //return date("h:i", strtotime($time_in) - strtotime($sched_time_in));
    }
}

if (! function_exists('late_in_minutes_display')) {

    function late_in_minutes_display($late_in_minutes){
        
        $latetimeHours      =  number_format(floor($late_in_minutes / 60), 0);
        $latetimeMinutes    =  number_format($late_in_minutes % 60, 0);

        $display_late_minutes = '<p class="text text-danger"> ';

        if($latetimeHours > 0)
            $display_late_minutes       .= $latetimeHours .' hour/s ';

        if($latetimeMinutes > 0)
            $display_late_minutes        .= $latetimeMinutes .' minutes ';
        
        $display_late_minutes        .= 'late </p>';


        return $display_late_minutes;

    }

}



if (! function_exists('undertime_in_minutes')) {

    function undertime_in_minutes($time_out, $sched_time_out){
        
        $undertime_in_minutes =  floor((strtotime($sched_time_out) - strtotime($time_out)) / 60 );

        if($undertime_in_minutes > 1){
             
            return $undertime_in_minutes;
        }
        
        return false;

        //return date("h:i", strtotime($time_in) - strtotime($sched_time_in));
    }
}

if (! function_exists('undertime_in_minutes_display')) {
    
    function undertime_in_minutes_display($undertime_in_minutes){

        
        $undertimeHours   =  number_format($undertime_in_minutes / 60, 0);
        $undertimeMinutes   =  number_format($undertime_in_minutes % 60, 0);
        
        $display_undertime       = '<p class="text text-danger"> ';

        if($undertimeHours > 0)
            $display_undertime        .= $undertimeHours .' hour/s ';

        if($undertimeMinutes > 0)
            $display_undertime        .= $undertimeMinutes .' minutes ';
        
        $display_undertime        .= 'undertime </p>';

        return $display_undertime;

    }

}

if (! function_exists('total_break_in_minutes')) {

    function total_break_in_minutes($break1, $break1_back, $break2, $break2_back){
        
        $total_break      = 0;

        $break1_in_minutes =  floor((strtotime($break1_back) - strtotime($break1)) / 60 );
        $break2_in_minutes =  floor((strtotime($break2_back) - strtotime($break2)) / 60 );


        $total_break       += $break1_in_minutes + $break2_in_minutes;
        
        return $total_break;


        return false;

    }
}


if (! function_exists('get_break_type')) {

    function get_break_type($current_attendance, $last_attendance_log){
        
        if($last_attendance_log == 'Lunch')
            return $current_attendance->lunch_in;

        if($last_attendance_log == 'Break 1')
            return $current_attendance->break1;

        if($last_attendance_log == 'Break 2')
            return $current_attendance->break2;

    
    }
    
}

if (! function_exists('display_attendance_punch_status')) {

    function display_attendance_punch_status( $last_attendance_log){
        
        $span_label = "";

        if($last_attendance_log == "Clock In"){
            $span_label .= '<span class="badge badge-success">';
        }

        if($last_attendance_log == "Break 1" || $last_attendance_log == "Break 2" || $last_attendance_log == "Lunch" ){
            $span_label .= '<span class="badge badge-warning">';
        }

        if($last_attendance_log == "Back (Break 1)" || $last_attendance_log == "Back (Break 2)" || $last_attendance_log == "Back (Lunch)" ){
            $span_label .= '<span class="badge badge-info">';
        }

        if($last_attendance_log == "Clock Out"){
            $span_label .= '<span class="badge badge-danger">';
        }

        $span_label = $span_label. $last_attendance_log. "</span>";
        
        return $span_label; 

    }
    

}



if (! function_exists('hours_diff')) {

    function hours_diff( $date1, $date2){

        if(!$date1 or !$date2)
            return 0;

        $seconds_diff = strtotime($date1) - strtotime($date2);

        $difference =  number_format(($seconds_diff / 3600), 2);


        return $difference;

        //return min($difference, $limit);


    }
    

}

if (! function_exists('get_work_hours')) {

    function get_work_hours( $schedule, $limit, $late_in_minutes, $overbreak_in_minutes, $undertime_in_minutes) {
        
        $work_hours =  min(hours_diff($schedule->time_out, $schedule->time_in) - hours_diff($schedule->lunch_out, $schedule->lunch_in), $limit);

        //$total_work_hours_reduction = ($late_in_minutes + $overbreak_in_minutes + $undertime_in_minutes);

        $total_work_hours_reduction = $overbreak_in_minutes;

        $work_hours                 = $work_hours - ($total_work_hours_reduction / 60);
         
        return number_format($work_hours, 2);

    }

}

if (! function_exists('get_nd_hours')) {

    function get_nd_hours( $schedule) {

    }

}

//* Fields */

if (! function_exists('department_field')) {

    function department_field($args = array(), $department_id = ''){

        $departments        = Departments::where('record_status', 1)->get();

        $department_field = '<select ';

        foreach($args as $key => $attrib_val){
            $department_field .= $key .'= "'.$attrib_val.'" ';    
        }

        $department_field .= '>';

        $department_field .='<option value="" selected>All Departments</option>';

                    
        foreach($departments as $department){

            $is_selected = ($department_id == $department->id) ? 'selected': '';

            $department_field .= '<option value='. $department->id .'>'. $department->department_name . '</option>';
                        
        }

        $department_field .= '</select>';

        return $department_field;
    }

}



if (! function_exists('employees_field')) {

    function employees_field($args = array(), $employee_id = ''){

        $employees        = Employees::where('record_status', 1)->get();

        $employees_field = '<select ';

        foreach($args as $key => $attrib_val){
            $employees_field .= $key .'= "'.$attrib_val.'" ';    
        }

        $employees_field .= '>';

        $employees_field .='<option value="" selected>All Employees</option>';

                    
        foreach($employees as $employee){
            
            $is_selected = ($employee_id == $employee->id) ? 'selected': '';
                                
            $employees_field .= '<option value='. $employee->id .' '. $is_selected.'>'. $employee->getFullName() . '</option>';
                        
        }

        $employees_field .= '</select>';

        return $employees_field;
    }

}


//* End Fields */
