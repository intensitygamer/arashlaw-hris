<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobPositions;

class JobPositionsController extends Controller
{
    //
    
    public function index(){

        $job_positions          = JobPositions::where('record_status', 1)->get();

        return view('job_positions.index')
                    ->with('job_positions', $job_positions);
 
    }
    
    public function store(Request $request){

 
        $job_positions    = new JobPositions;

        $job_positions->job_title           = $request->job_title; 
        $job_positions->job_description     = $request->job_description; 
        $job_positions->department_id       = $request->department_id; 
  
        $job_positions->save();
        
        // redirect()->route('departments');

        if($job_positions){

            return response(array('message' => "Job Positions Sucessfully Added!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "Job Positions Failed Updating, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');



    }

}
