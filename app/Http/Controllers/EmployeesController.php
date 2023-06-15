<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;
use App\Models\PayrollHeaders;
use App\Models\Departments;

use App\Traits\EmployeesTrait;

class EmployeesController extends Controller
{
    //

    use EmployeesTrait;
    
    public function index(){

        $view_data = array();
         
        $view_data['departments']       = Departments::where('record_status', 1)->get();
        $view_data['payroll_headers']   = PayrollHeaders::where('record_status', 1)->get();
        $view_data['employees']         = Employees::where('record_status', 1)->get();

        return view('employees.index')
                    ->with($view_data);

    }

    public function add(){

        //return view('employees.add');

    }

    public function save(Request $request){

        $employee   = new Employees;

        $emp        =  $this->emp_save($employee, $request);


        if($employee){

            return response(array('message' => "Employee Sucessfully Added!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "Employee Failed Adding, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');


    }

    public function retrieve(){
        
        $employees          = Employees::where('record_status', 1)->get();
 
 
        foreach($employees as $employee){

            $employeeData[$i]['employee_no']         = $employee->id;
            $employeeData[$i]['employee_name']       = $employee->getFullName();
            
            $i++;

         }

        return response(json_encode($employeeData))
                    ->header('Content-Type', 'application/json');


    }

    public function retrieve_info(Request $request){

        $emp_id         = $request->input('employeeID');
        
        $employee_info  = Employees::where('record_status', 1)
                                    ->where('id', $emp_id)
                                    ->get()->first();

        return response(json_encode($employee_info))
                    ->header('Content-Type', 'application/json');

    }

    public function terminate(Request $request){

        $emp_id     = $request->input('employee_id');
        $employee   = Employees::find($emp_id)->update(['record_status' => 0]);

        if($employee){

        }
        
        //return view('employees.terminate');

    }

}
