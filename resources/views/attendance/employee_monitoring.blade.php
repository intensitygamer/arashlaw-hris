 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Employee Attendance Monitoring </strong>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            
                        <div class="col-md-4  col-sm-12">
                            <div class='form-group'>
                
                                <label> <b>  Department </b> </label> 
                                    
                                {!! department_field(array('class' => 'form-control standardSelect')) !!}

                            </div>                   
                            
                        </div>

                        <div class="col-md-2 col-sm-12 ">

                            <div class='form-group'>

                                <label> <b>  Refresh Rate </b> </label> 

                                <select class="form-control standardSelect" id="refresh_rate_dropdown">
                                    <option value="1">1s</option>
                                    <option value="5">5s</option>
                                    <option value="10">10s</option>
                                    <option value="20">20s</option>
                                    <option value="30">30s</option>
                                </select>

                            </div>  

                        </div>

                    </div>
                        <div class='row'>

                            <div class='col col-md-12'>

                                <table class="table table-striped " id="employee-monitoring-table">
                                    
                                    <thead>
                                        <tr>
                                            <td> <b> Employee ID </b> </td>
                                            <td> <b> Employee Name </b>   </td>
                                            <td> <b> Time In </b>   </td>
                                            <td> <b> Break 1 </b>   </td>
                                            <td> <b> Break 2 </b>   </td>
                                            <td> <b> Lunch  </b>   </td>
                                            <td> <b> Time Out </b>   </td>
                                            <td> <b> Last Logged Status </b>   </td>
                                        </tr>
                                    </thead>

 
                                </table>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection