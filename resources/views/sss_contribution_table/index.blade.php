 
@extends('layouts.dashboard')

@section('content')
 
<div class="col col-lg-12">

    <div class="card">

        <div class="card-header">
            <strong class="card-title"> SSS Contribution Table </strong>
        </div>

        <div class="card-body">
        
            <div class="row">
                 
                <a href="#" class="btn btn-success m-2"  data-toggle="modal" data-target="#addSSSContributionModal" > 
                    <i class="menu-icon fa fa-plus"></i>
                </a>  

                <table class="table table-striped table-bordered" id="payroll-list">
                    <thead>
                        <tr >
                            <th>Bracket ID</th>
                            <th>Range From </th>
                            <th>Range To</th>
                            <th>Note</th>
                            <th>Salary Credit</th>
                            <th>Employee Share</th>
                            <th>Total Contribution Amount</th>
 
                            <th>Date Created </th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($sss_contribution_table as $sss_contrib)

                            <tr>
                                <td> {{ $sss_contrib->id }} </td>
                                <td> {{ $sss_contrib->amount_range_from }} </td>
                                <td> {{ $sss_contrib->amount_range_to }} </td>
                                <td> {{ $sss_contrib->salary_credit }} </td>
                                <td> {{ $sss_contrib->employee_share }} </td>
                                <td> {{ $sss_contrib->employeer_share }} </td>
                                <td> {{ $sss_contrib->total_contribution_amount }} </td>
                             
                               <td>
                                    <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    
                                </td>


                            </tr>
                        
                        @endforeach 

                    </tbody>

                </table>
         

            </div>
            
             </div>

    </div>
    
</div>
@include('sss_contribution_table.modals.create')


@endsection

