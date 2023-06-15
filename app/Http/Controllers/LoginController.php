<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



use App\Models\Users;
use App\Models\Employees;

use Session;

class LoginController extends Controller
{
    //
    
    public function index(){
 

        return view('login');


    }
    
    public function login(Request $request) {
          
        $remember   = $request->remember_me;
         

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'record_status' => 1], $remember)) {

            $request->session()->regenerate();

            $employee = Employees::where('user_id', Auth::id())->first();

            $request->session()->put('employee_id', $employee->id);

            $request->session()->put('employee_name', $employee->first_name . ' '. $employee->last_name );

            $request->session()->put('employee', $employee);

            // return response(array('message' => "User Sucessfully Logged In!"), 200)
            //                     ->header('Content-Type', 'application/json');        

            return redirect('dashboard');
        }

        // return response(array('message' => "Invalid Logged In!"), 400)
        //                   ->header('Content-Type', 'application/json');

 
        return view('login')->with('login_error', "Invalid Loggin In");

 
    }

    public function login_form(){

        // echo Hash::make('123');

        // exit; 
        
        return view('login');
 
    }
    
    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
    

        return redirect('login');

    }

}
