<?php

namespace App\Traits;

use Illuminate\Http\Request;

use App\Models\Employees;


use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

trait EmployeesTrait {
 
    public function emp_save($employee, $request){

        $employee->first_name              = $request->first_name;
        $employee->last_name               = $request->last_name;
        $employee->middle_name             = $request->middle_name;
        $employee->birth_date              = $request->birth_date;
        $employee->gender                  = $request->gender;
        $employee->personal_email          = $request->personal_email;
        $employee->mobile_no               = $request->mobile_no;
        $employee->address                 = $request->address;
        $employee->company_email           = $request->company_email;
        $employee->job_position_id         = $request->job_position_id;
        $employee->department_id           = $request->department_id;
        $employee->work_shift_time_in      = $request->work_shift_time_in;
        $employee->work_shift_time_out     = $request->work_shift_time_out;
        $employee->work_shift_id           = $request->work_shift_id;
        $employee->hired_date              = $request->hired_date;
        $employee->start_date              = $request->pagibig_id;
        $employee->pagibig_id              = $request->pagibig_id;
        $employee->philhealth_id           = $request->philhealth_id;
        $employee->employee_no             = $request->employee_no;
        

       return $employee->save();
 
    }

}
