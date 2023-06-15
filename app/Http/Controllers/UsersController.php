<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Employees;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Database\Query\Builder;


class UsersController extends Controller
{
    //

    public function save(Request $request) {

        $user = new User;

        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $employee_id = $request->employee_id;
        
        $user_id =  $user->save();
        // $user->assignedRole('User');   
        
        if($user ){

            $employee = Employees::find($employee_id)->update(['user_id' => $user_id]);


            return response(array('message' => "User Sucessfully Added!"), 200)
                                ->header('Content-Type', 'application/json');        

        }

        return response(array('message' => "User Failed Adding, Please Try Again!"), 400)
                          ->header('Content-Type', 'application/json');

 
    }


    public function index(Request $request) {
 

        $users          = User::where('record_status', 1)->get();

        //* Modal Data

        //$payroll_headers    = PayrollHeaders::where('record_status', 1)->get();

        return view('users.index')
                    ->with(compact('users'));

    }

    public function retrieve(Request $request) {

        
        $data_retrieved = array();
        
        $i = 0;

        foreach($leads_list as $lead){
            
            $data_retrieved[$i]['lead_id'] = $lead->id;
            $data_retrieved[$i]['title'] = $lead->title;
            $data_retrieved[$i]['client_name']  = $lead->getClientFullName();
            $data_retrieved[$i]['company']      = $lead->company;
            
            //$data_retrieved[$i]['accounts'] = ($lead->accounts) ? $lead->accounts->account_name : '';
            
            $data_retrieved[$i]['checkbox'] =  "";

            if( session()->get('user_type_id') == ADMIN){

                $data_retrieved[$i]['checkbox'] =  "<input type='checkbox' name='leads[]' class='leads_list_checkbox' value=".$lead->id." />";
            
            }

            $data_retrieved[$i]['labels'] = '';

            foreach($lead->labels as $label){
                
                if($label->label_info !== NULL)
                    $data_retrieved[$i]['labels'] .= "<span class='badge leads-list-badge' style='background-color: ". $label->label_info->hsl_color_code."'>". $label->label_info->label_name . "</span>";

            }

            $data_retrieved[$i]['assigned_to'] = '';

            if($lead->assigned_to)
                $data_retrieved[$i]['assigned_to'] = $lead->assigned_to->getFullName();

            $data_retrieved[$i]['last_updated'] = date("M d, Y h:i A", strtotime($lead->updated_at));
           
            $data_retrieved[$i]['last_notes'] = '';

            if($lead->notes){

                foreach($lead->notes->take(1) as $lastNote){
                    $data_retrieved[$i]['last_notes'] = $lastNote->note.'<br><small>'. date("M d, Y", strtotime($lastNote->created_at)). '</small> 
                                    <br><small> '. $lastNote->created_by_user->getFullName() .'</small>'; 
                }
            } 

            //$data_retrieved[$i]['website']  = $lead->website;
            $data_retrieved[$i]['phone']    = $lead->phone;
            $data_retrieved[$i]['email']    = $lead->email;
            $data_retrieved[$i]['timezone'] = $lead->timezone;
            $data_retrieved[$i]['created_at'] = date("M d, Y", strtotime($lead->created_at));
            $data_retrieved[$i]['buttons'] = '<button type="button" class="btn btn-success p-2 edit_lead_btn" id="'.$lead->id.'" data-bs-toggle="modal" data-bs-target="#editLeadModal">
                                                    <i class="fa fa-edit"></i></button>';
                                                    // <button type="button" class="btn btn-success p-2 convert_lead_btn" data-bs-toggle="modal" data-bs-target="#convertDealModal" value="'.$lead->id.'" style="margin-left: 5px;">
                                                    // <i class="fa fa-dollar"></i></button>';

            // <button type="button" class="btn btn-primary p-2 activity_lead_btn" data-bs-toggle="modal" data-bs-target="#addActivityModal" value="'.$lead->id.'" style="margin-left: 5px;">
            // <i class="fa fa-calendar"></i></button>
            
            if( session()->get('user_type_id') == ADMIN){
                    $data_retrieved[$i]['buttons'] .= '<button type="button" class="btn btn-danger p-2 del_lead_btn" data-bs-toggle="modal" data-bs-target="#delLeadModal" data-leadId="'.$lead->id.'" style="margin-left: 5px"> 
                                                            <i class="fa fa-trash"></i>  
                                                        </button>';
            }

            $i++;

        }

        $returned_data['recordsTotal'] = $i;

        $returned_data['data'] = $data_retrieved;

        return response($returned_data)
                ->header('Content-Type', 'application/json');


    }

    public function profile_update(Request $request) {



        return response(array('message' => "User Profile Update!"), 200)
                                ->header('Content-Type', 'application/json');        



    }
}
