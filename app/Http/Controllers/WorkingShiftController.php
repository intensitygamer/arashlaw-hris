<?php

namespace App\Http\Controllers;
use App\Models\WorkShift;

use Illuminate\Http\Request;


class WorkingShiftController extends Controller
{
    //
    
    
    public function index(){

        $work_shifts          = WorkShift::where('record_status', 1)->get();

        return view('work_shifts.index')
                ->with('work_shifts', $work_shifts);

    }

    public function store(Request $request){

 
        $workShift    = new WorkShift;

        $workShift->description = $request->description; 
        $workShift->time_in     = $request->time_in; 
        $workShift->time_out    = $request->time_out; 


        $workShift->monday      = $request->monday ?? 0; 
        $workShift->tuesday     = $request->tuesday ?? 0; 
        $workShift->wednesday   = $request->wednesday ?? 0; 
        $workShift->thursday    = $request->thursday ?? 0; 
        $workShift->friday      = $request->friday ?? 0; 
        $workShift->saturday    = $request->saturday ?? 0; 
        $workShift->sunday      = $request->sunday ?? 0; 

          
        $workShift->created_by_id     = 1; 

        $workShift->save();

        if($workShift){

            return response(array('message' => "WorkShift Sucessfully Added!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "WorkShift Failed Updating, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');


  
    }


}
