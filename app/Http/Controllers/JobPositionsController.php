<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobPositionsController extends Controller
{
    //
    
    public function index(){

        return view('job_positions.index');

    }

    
}
