 
@extends('layouts.dashboard')

@section('content')
 
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <!-- <h1>Payroll</h1> -->
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <!-- <li class="active">Payroll</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title"> Payroll </strong>
        </div>
        <div class="card-body">

            <a href="#" class="btn btn-success m-2" data-toggle="modal" data-target="#createPayrollHeadersModal"> 
                <i class="menu-icon fa fa-plus"></i>
            </a>  
            <div class="row">
        

                <table class="table table-striped table-bordered" id="payroll-headers">
                    <thead>
                        <tr>
                            <th>Payroll Header ID</th>
                            <th>Header Label</th>
                            <th>Header Description</th>
                            <th>Type</th>
                            <th>Amount Type</th>
                            <th>Amount Rate</th>

                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($payroll_headers as $payroll_header)

                            <tr>
                                <td> {{ $payroll_header->id }} </td>
                                <td> {{ $payroll_header->label }} </td>
                                <td> {{ $payroll_header->description }} </td>
                                <td> {{ $payroll_header->type }} </td>
                                <td> {{ $payroll_header->amount_type }} </td>
                                <td> @if($payroll_header == 'rate') {{ $payroll_header->amount_rate.'%' }}  @endif </td>

                                 <td>
                                    <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#editPayrollHeaderModal"> <i class="menu-icon fa fa-edit"></i></a>  
                                    <a href="#" class="btn btn-danger mb-2" data-toggle="modal" data-target="#deletePayrollHeaderModal"> <i class="menu-icon fa fa-trash"></i></a>  
                                    <a href="#" class="btn btn-info mb-2" data-toggle="modal" data-target="#viewPayrollHeaderModal"> <i class="menu-icon fa fa-eye"></i></a>  
 
                                </td>



                            </tr>
                        
                        @endforeach 

                    </tbody>

                </table>
         

            </div>
        </div>
    </div>
</div>

@include('payroll.modals.create_headers')

@endsection