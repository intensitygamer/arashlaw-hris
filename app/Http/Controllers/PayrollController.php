<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employees;
use App\Models\PayrollHeaders;
use App\Models\Departments;
use App\Models\Salary;
use App\Models\SSS_Contribution;
use App\Traits\AttendanceTrait;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    //
    use AttendanceTrait;

    public function index(Request $request){

        $payrolls           = Payroll::withSum('salaries', 'netpay_amount')
                                        ->withSum('salaries', 'total_deduction_amount')
                                        ->withSum('salaries', 'gross_pay_amount')
                                        ->where('record_status', 1)
                                        ->get();


        //'total_deduction_amount', 'gross_pay_amount')

        $payroll_headers    = PayrollHeaders::where('record_status', 1)->get();

        return view('payroll.index')
                    ->with(compact('payroll_headers', 'payrolls'));

    }
 
    
    public function create_form(Request $request){
 
       // $departments        = Departments::where('record_status', 1)->get();

        return view('payroll.create_form');

    }

     
    public function create(Request $request){
        
        $payroll = new Payroll;

        $payroll->note          = $request->input('note') ?? '';
        $payroll->from_date     = $request->input('from_date') ?? '';
        $payroll->to_date       = $request->input('to_date') ?? '';
        $payroll->payroll_type  = $request->input('payroll_type') ?? '';
        $payroll->created_by_id = session()->get('employee_id');

        $payroll->save();

        $payroll_id = $payroll->id;

        $employees          = Employees::where('record_status', 1);

        if($request->input('department_id')){
            $employees = $employees->where('department_id', $request->input('department_id'));
        }


        $employees = $employees->get();

        $emp_salary_data    = array();

        $i = 0;

        foreach($employees as $employee){ 
            
            $emp_salary_data[$i]['employee_id'] = $employee->id;
            $emp_salary_data[$i]['payroll_id']  = $payroll_id;

            $i++;

        }
 
        Salary::insert($emp_salary_data);

        redirect()->route('payroll.edit')->with('payroll_id', $payroll_id); 
        

    }

    public function edit_payroll(Request $request){

        $payroll_id = $request->payroll_id;

        $payroll    = Payroll::find($payroll_id);

        $emp_salary = Salary::where('payroll_id', $payroll_id)->get();

 
        //$from_date  = $payroll->from_date;
        //$to_date    = $request->input('to_date') ?? '';
 

        return view('payroll.edit')
                ->with(compact('emp_salary', 'payroll', 'payroll_id'));
    
    }
    
    public function generate(Request $request){
  
    }

    public function headers(Request $request){
 

        $payroll_headers  = PayrollHeaders::where('record_status', 1)->get();


        $to_date    = $request->input('to_date');
        $from_date  = $request->input('from_date');


        return view('payroll.headers')
                    ->with(compact('payroll_headers'));

    }

    public function create_headers(Request $request){ 

        $payroll_headers    = new PayrollHeaders;

        $payroll_headers->label              = $request->label; 
        $payroll_headers->amount_type        = $request->amount_type; 
        $payroll_headers->amount_rate        = $request->amount_rate; 
        $payroll_headers->rate_base_from     = $request->rate_base_from; 
        
        $payroll_headers->created_by_id     = 1; 

        $payroll_headers->save();

        if($payroll_headers){

            return response(array('message' => "Payroll Header Sucessfully Added!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "Payroll Header Failed Updating, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');


    }

    public function delete(Request $request){

        $payroll_id = $request->payroll_id;
        
        $payroll_delete = Payroll::find($payroll_id)->delete();
        
        if($payroll_delete){

            return response(array('message' => "Payroll Deleted Sucessfully Added!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "Payroll Deleted, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');
    }

    public function publish(Request $request){

        $payroll_id                 = $request->payroll_id;

        $payroll_publish            =  Payroll::find($payroll_id);

        $payroll_publish->status    = 'publish';

        $payroll_publish->save();

        if($payroll_publish){

            return response(array('message' => "Payroll Published Sucessfully!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "Error in Publishing Payroll, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');
 
    }

}
