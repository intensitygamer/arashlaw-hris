 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    
                    <div class="card-header">


                        <div class="pull-left">
                            <strong class="card-title">Employees</strong>
                         </div>
                    <!-- 
                        <div class="pull-right">
                            <button class="btn btn-primary m-2" data-toggle="modal" data-target="#addEmployeesModal"> New + </button><br>
                        </div> -->
                        

                    </div>

                    
                    <div class="card-body">

                        <a href="#" class="btn btn-success m-2" data-toggle="modal" data-target="#addEmployeesModal"> 
                            <i class="menu-icon fa fa-plus"></i>
                        </a>  

                        <table class="table table-striped table-bordered" id="employees-list">
                            <thead>
                                <tr >
                                    <th> </th>
                                    <th> #</th>
                                    <th>Employee</th>
                                    <th>Job Title</th>
                                    <th>Department</th>
                                    <th>Hired Date</th>
                                    <th>Start Date</th>
                                    <th>Company Email</th>
                                     <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($employees as $employee)

                                    <tr>
                                        <td> <input type="checkbox" value="{{ $employee->id }}" /> </td>
                                        <td> {{ $employee->employee_no }} </td>
                                        <td> {{ $employee->getFullName() }} </td>

                                        <td> {{ $employee->job_position }} </td>

                                        <td> {{ $employee->department->department_name ?? ''}} </td>

                                        <td> {{ date("M, d Y", strtotime($employee->hired_date)) }}</td>
                                        <td> {{ date("M, d Y", strtotime($employee->start_date)) }}</td>
                                        <td> {{ $employee->company_email }} </td>
                            
                                        <td>
                                            <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-bs-empId="{{ $employee->id }}" data-target="#editEmployeesModal"> <i class="menu-icon fa fa-edit"></i></a>  
                                            <a href="#" class="btn btn-info mb-2" data-bs-empId="{{ $employee->id }}" data-toggle="modal" data-target="#viewEmployeesModal"> <i class="menu-icon fa fa-eye"></i></a>  
                                            <a href="#" class="btn btn-danger mb-2" data-bs-empId="{{ $employee->id }}" data-toggle="modal" data-target="#terminateEmployeesModal"> <i class="menu-icon fa fa-trash"></i></a> 
                                            <a href="{{ route('attendance.employee') }}" class="btn btn-primary mb-2" > <i class="menu-icon fa fa-clock-o"></i></a> 
                                            
                                                <!-- Display Add Use Modal if Employee doesnt have a user account yet -->

                                            @if(!$employee->user_id)
                                                <a href="#" class="btn btn-info mb-2 add-user-btn" data-toggle="modal" data-bs-empId="{{ $employee->id }}" data-target="#addUserModal"> <i class="menu-icon fa fa-user-plus"></i></a> 
                                            
                                            @else

                                                <!-- Edit User Info if Exist -->

                                                <a href="#" class="btn btn-success mb-2  edit-user-btn" data-toggle="modal" data-bs-empId="{{ $employee->id }}" data-target="#editUserModal"> 
                                                    <i class="menu-icon fa fa-user"></i>
                                                </a> 

                                            
                                            @endif 

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

@include('employees.modals.add')
@include('employees.modals.edit')
@include('employees.modals.delete')
@include('users.modals.add')


@include('employees.modals.attendancePunchIns')
 
@endsection