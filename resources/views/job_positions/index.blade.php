 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Job Positions</strong>
                    </div>
                    <div class="card-body">
                        
                        <a href="#" class="btn btn-success m-2" data-toggle="modal" data-target="#addJobPositionModal"> 
                            <i class="menu-icon fa fa-plus"></i>
                        </a>  


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Actions </th>
                                </tr>
                            </thead>

                            <tbody>
                              
                            @foreach($job_positions as $job_position)

                                <tr>
                                    <td> {{ $job_position->job_title }} </td>
                                    <td> {{ $job_position->job_description }} </td>
                                    <td> {{ $job_position->department_id }} </td>

                                        <td>
                                            <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#editJobPositionModal"> <i class="menu-icon fa fa-edit"></i></a>  
                                            <a href="#" class="btn btn-danger mb-2"  data-toggle="modal" data-target="#delJobPositionModal"> <i class="menu-icon fa fa-trash"></i></a>    
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


@include('job_positions.modals.add')

@endsection