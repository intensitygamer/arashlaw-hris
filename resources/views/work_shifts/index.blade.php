 
@extends('layouts.dashboard')

@section('content')


 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    
                    <div class="card-header">


                        <div class="pull-left">
                            <strong class="card-title"> Work Shifts </strong>
                         </div>

                    </div>

                    
                    <div class="card-body">

                        <a href="#" class="btn btn-success m-2" data-toggle="modal" data-target="#addWorkShiftModal"> 
                            <i class="menu-icon fa fa-plus"></i>
                        </a>  


                        <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr> 
                                        <td><b> Description</b></td>
                                        <td><b> Time In </b></td>
                                        <td><b> Time Out </b></td>
                                        <td><b> Days </b></td>
                                    </tr>

                                </thead>

                            <tbody>

                                @foreach($work_shifts as $work_shift)
                                    
                                    <tr> 
                                        <td> {{ $work_shift->description }} </td>
                                        <td> {{ date("h:i A", strtotime($work_shift->time_in)) }} </td>
                                        <td> {{ date("h:i A", strtotime($work_shift->time_out)) }} </td>
 
                                        <td> 
                                            @if($work_shift->monday)
                                                <i class="fa fa-check"></i>Monday <br>
                                            @endif

                                            @if($work_shift->tuesday)
                                                    <i class="fa fa-check"></i>Tuesday <br>
                                            @endif

                                            @if($work_shift->wednesday)
                                                <i class="fa fa-check"></i>Wednesday <br>
                                            @endif

                                            @if($work_shift->thursday)
                                                <i class="fa fa-check"></i>Thursday <br>
                                            @endif
 
                                            @if($work_shift->friday)
                                                <i class="fa fa-check"></i>Friday <br>
                                            @endif
                                            
                                            @if($work_shift->saturday)
                                                <i class="fa fa-check"></i> Saturday <br>
                                            @endif

                                            @if($work_shift->sunday)
                                                <i class="fa fa-check"></i>Sunday <br>
                                            @endif
      
                                        </td>

                                        <td>
                                            <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#editWorkShiftModal"> <i class="menu-icon fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger mb-2" data-toggle="modal" data-target="#delWorkShiftModal"> <i class="menu-icon fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                
                                @endforeach
 
                                </tr>

                            </tbody>

                        </table>
                
                    </div>

                </div>
            </div>
        </div>
        
    </div>
</div>

@include('work_shifts.modals.add')
@include('work_shifts.modals.edit')
@include('work_shifts.modals.delete')

@endsection
