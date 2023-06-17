<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employees;
use Illuminate\Http\Request;

use PDF;
use Hash;

class SalaryController extends Controller
{

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
        //

        return view('salary.view');

    }

    public function print(Request $request)
    {
        
        $salary_id = $request->salary_id;

        $salary_info   = Salary::find($salary_id);


        // Make guard here (can only view admin/hr or own employees)

        // return view('salary.print')->with(compact('salary_info'));

        // exit;
 
        if($salary_info){
                
            $pdf = PDF::loadView('salary.print', array('salary_info' => $salary_info))->setPaper('legal', 'landscape')->setWarnings(false)->setOption(['dpi' => 96, 'defaultFont' => 'sans-serif']);

            return $pdf->stream();
            
        }


 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        //

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $salary_id = $request->input('salary_id');

        $salary = Salary::find($salary_id);

        Salary::where('id', $salary_id)->update($request->except('_token', 'salary_id'));

        //$salary->total_hours_worked = $request->input('total_hours_worked');
        //$salary->allowance          = $request->input('allowance');


        $salary->save();

        if($salary){

            return response(array('message' => "Employee Salary Sucessfully Updated!"), 200)
                                ->header('Content-Type', 'application/json');        

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        //
    }

    public function retrieve(Request $request){

        $salary_id         = $request->input('salary_id');
        

        $salary_info  = Salary::where('id', $salary_id)
                                    ->get()->first();

        return response(json_encode(array('salary_info' => $salary_info, 'employee_info' => $salary_info->employee_info)))
                    ->header('Content-Type', 'application/json');

    }

    public function retrieve_payroll(Request $request){

        $payroll_id         = $request->input('payroll_id');


        $salary_list  = Salary::where('payroll_id', $payroll_id)
                                    ->get();

        return response(json_encode(array('salary_list' => $salary_list)))
                    ->header('Content-Type', 'application/json');
                    
    }


}
