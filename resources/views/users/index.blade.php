 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    
                    <div class="card-header">


                        <div class="pull-left">
                            <strong class="card-title">Users</strong>
                         </div>
                    <!-- 
                        <div class="pull-right">
                            <button class="btn btn-primary m-2" data-toggle="modal" data-target="#addEmployeesModal"> New + </button><br>
                        </div> -->
                        

                    </div>

                    
                    <div class="card-body">

                        <a href="#" class="btn btn-success m-2" data-toggle="modal" data-target="#addUserModal"> 
                            <i class="menu-icon fa fa-plus"></i>
                        </a>  

                        <table class="table table-striped table-bordered" id="users-list">
                            <thead>
                                <tr >
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $user)

                                    <tr>
                                        <td> {{ $user->id }} </td>
                                        <td> {{ $user->username }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ date_formatter($user->created_at) }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#editUserModal"> <i class="menu-icon fa fa-edit"></i></a>  
                                            <a href="#" class="btn btn-info mb-2"   data-toggle="modal" data-target="#viewUserModal"> <i class="menu-icon fa fa-eye"></i></a>  
                                            <a href="#" class="btn btn-danger mb-2" data-toggle="modal" data-target="#delUserModal"> <i class="menu-icon fa fa-trash"></i></a> 
                                            <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#changePassModal"> <i class="fa fa fa-key"></i></a> 
  
                                        </td>

                                    </tr>
                                
                                @endforeach 

                            </tbody>

                        </table>
                 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('users.modals.add')

@include('users.modals.change_pass')

@include('users.modals.edit')

 
@endsection