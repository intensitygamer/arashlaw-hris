 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Salary List </strong>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr >
                                    <th scope="col">Employee Name</th>
                                    <th scope="col" >Payroll ID</th>
                                    <th scope="col" >Payroll Date </th>
                                    <th scope="col" >Total Amount</th>
                                    <th scope="col" ></th>
                                    
                                </tr>
                            </thead>
                            <tbody>

 
                                <tr>
                                    <td> Kenneth Argandez </td>
                                    <td> <a href="#"> 25 </a></td>
                                    <td> May 10, 2023 </td>
                                    <td> P 25, 000.00 </td>
                                       
                                    <td>
                                        <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#editEmployeesModal"> <i class="menu-icon fa fa-edit"></i></a>  
                                        <a href="{{ route('salary.view') }}" class="btn btn-info mb-2" > <i class="menu-icon fa fa-eye"></i></a>  
                                        <a href="{{ route('salary.print') }}" class="btn btn-primary mb-2"> <i class="menu-icon fa fa-print"></i></a> 

                                    </td>


                                </tr>
                            
 
                  
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