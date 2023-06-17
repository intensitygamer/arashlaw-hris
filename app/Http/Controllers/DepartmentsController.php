<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Departments;

class DepartmentsController extends Controller
{
    //
    
    public function index(){

        $departments          = Departments::where('record_status', 1)->get();

        return view('departments.index')
                    ->with('departments', $departments);


    }

    public function store(Request $request){

 
        $department    = new Departments;

        $department->department_name         = $request->department_name; 
        $department->department_desc         = $request->department_desc; 
        $department->parent_department_id    = $request->parent_department_id; 
        $department->department_head_id      = $request->department_head_id; 
  
        $department->save();
        
        // redirect()->route('departments');

        if($department){

            return response(array('message' => "Department Sucessfully Added!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "Department Failed Updating, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');



    }

}
