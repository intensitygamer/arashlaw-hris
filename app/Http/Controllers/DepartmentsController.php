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

}
