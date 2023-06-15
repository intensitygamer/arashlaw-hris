 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Departments</strong>
                    </div>
                    <div class="card-body">
                        
                        <a href="#" class="btn btn-success m-2" data-toggle="modal" data-target="#addDepartmentsModal"> 
                            <i class="menu-icon fa fa-plus"></i>
                        </a>  

                        <table class="table">
                            <thead>
                                <tr >
                                    <th scope="col">Name</th>
                                    <th scope="col" >Department Head</th>
                                    <th scope="col" >Parent Department</th>
                                    <th scope="col" >Description</th>
                                    <th scope="col" ></th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($departments as $department)

                                <tr>
                                    <td> {{ $department->department_name }} </td>
                                    <td> {{ $department->department_head_id }} </td>
                                    <td> {{ $department->parent_department_id }} </td>
                                    <td> {{ $department->department_desc }} </td>
                                       

                                    <td>
                                        <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#editEmployeesModal"> <i class="menu-icon fa fa-edit"></i></a>  
                                        <a href="#" class="btn btn-info mb-2" data-toggle="modal" data-target="#editEmployeesModal"> <i class="menu-icon fa fa-eye"></i></a>  
                                        <a href="#" class="btn btn-danger mb-2" data-toggle="modal" data-target="#delEmployeesModal"> <i class="menu-icon fa fa-trash"></i></a> 

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

@include('departments.modals.add')

@endsection