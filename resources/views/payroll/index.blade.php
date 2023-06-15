 
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

<div class="col col-lg-12">

    <div class="card">

        <div class="card-header">
            <strong class="card-title"> Payroll </strong>
        </div>

        <div class="card-body">
        
            <div class="row">
                 
                <a href="#" class="btn btn-success m-2"  data-toggle="modal" data-target="#addPayrollModal" > 
                    <i class="menu-icon fa fa-plus"></i>
                </a>  

                <table class="table table-striped table-bordered text-center" id="payroll-list">
                    <thead>
                        <tr >
                            <th>Payroll ID</th>
                            <th>Payroll Period </th>
                            <th>Payroll Type</th>
                            <th>Total Gross</th>
                            <th>Total Deductions</th>
                            <th>Total Netpay</th>
                            <th>Note</th>
                            <th>Date Created</th>
                            <th>Created By</th>
                            <th>Last Updated</th>
                            <th>Status</th>

                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($payrolls as $payroll)

                            <tr>
                                <td> {{ $payroll->id }} </td>
                                <td> {{ date("M d, Y", strtotime($payroll->from_date)) . ' - '. date("M d, Y", strtotime($payroll->to_date))  }} </td>
                                <td> {{ $payroll->payroll_type }} </td>
                                <td> P {{ number_format($payroll->salaries_sum_gross_pay_amount, 2) }} </td>
                                <td> P {{ number_format($payroll->salaries_sum_total_deduction_amount, 2)  }} </td>
                                <td> P {{ number_format($payroll->salaries_sum_netpay_amount, 2) }} </td>
                                <td> {{ $payroll->note }} </td>
                                <td> {{ date("M d, Y", strtotime($payroll->created_at))  }} </td>
                                <td> {{ $payroll->created_by->username ?? ''}} </td>

                                <td> {{ date("M d, Y", strtotime($payroll->updated_at))  }} </td>


                                <td>{{ $payroll->status }} </td>

                                <td>
                                    <form action = "{{ route('payroll.edit') }}" method="POST">
                                        
                                        @csrf 

                                        <input type ="hidden" value="{{ $payroll->id }}" name="payroll_id" />   
                                        
                                        <button type="submit" class="btn btn-success mb-2"> <i class="menu-icon fa fa-calculator"></i>  </button>
                                        <a href="#" class="btn btn-success mb-2 payroll-edit-btn" data-toggle="modal" data-target="#editPayrollModal"> <i class="menu-icon fa fa-edit"></i></a>  

                                    </form>


                                    <a href="#" class="btn btn-info mb-2 payroll-edit-btn" data-toggle="modal" data-target="#viewPayrollModal" value="{{ $payroll->id }}"> <i class="menu-icon fa fa-eye"></i></a>  
                                    <a href="#" class="btn btn-danger mb-2 payroll-delete-btn" data-toggle="modal" data-target="#deletePayrollModal" value="{{ $payroll->id }}"> <i class="menu-icon fa fa-trash"></i></a>  

                                </td>


                            </tr>
                        
                        @endforeach 

                    </tbody>

                </table>
         

            </div>
            
             </div>

    </div>
    
</div>

@include('payroll.modals.create')

@include('payroll.modals.edit')

@include('payroll.modals.delete')

@endsection

