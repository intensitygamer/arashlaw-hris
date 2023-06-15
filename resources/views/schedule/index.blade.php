 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Schedule </strong>
                    </div>
                    <div class="card-body">
            
            <form method="GET" id="save_schedule_form">

                        <div class="row">

                            <div class="col col-4">
                                    

                                @csrf    

                                <table class="table">
                                        
                                    <tr><td><b> From Date </b> </td> 
                                        <td><input type="date" class="form-control" name="from_date" value="{{$from_date}}"/> 
                                    </td>

                                    <tr><td><b>To Date </b> </td>  
                                        <td><input type="date" class="form-control" name="to_date" value="{{$to_date}}"/>  
                                    </td>
                                
                                </table>
                                

                            </div>

                            <div class="col col-2">
                            </div>

                            <div class="col col-4">
                                <table class="table">

                                    <tr><td><b> Employee </b> </td>  
                                        <td><select class="form-control" name="employee" id="employee-dropdown" multiple="multiple">
                                            <option>Khera</option>
                                            <option>Ken</option>
                                            <option>Vinz</option>
                                        </select>                              
                                    </td>


                                    <tr><td><b> Department </b> </td>  
                                        <td><select class="form-control" id="department-dropdown" multiple="multiple">
                                            <option>Production</option>
                                            <option>Software Development</option>
                                            <option>VA Department</option>
                                            <option>Business Dev</option>
                                            <option>Operations</option>
                                            <option>HR and Recruitment</option>
                                        </select>  
                                    </td>
                                    
                                </table>
    

                        </div>

                    </div>

                    <div class="row">
                        <div class="col col-2">

                            <button type="submit" class="btn btn-success mb-2"> Apply Filter <i class="fa fa-filter"></i> </button>
                        
                        </div>
                    </div>
                    
            </form>
                    
            <form action = "{{ route('schedule.mass_update') }}" method="POST" id="save_attendance_form">

                         @csrf    

                            <div class="employee-list-table-container">

                                <table class="table mt-4" id="employee-list-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" >Employee</th>
                                            
                                            @for($date_cnt = 0;  $date_cnt <= $days_diff_cnt; $date_cnt++)

                                                <th scope="col" colspan="2"  class="text-center">  {{ date('D', strtotime("+". $date_cnt . " day". $from_date)) }} 
                                                    <br>  {{ date('m/d', strtotime("+". $date_cnt . " day". $from_date)) }}  <br>  
                                                </th>
                                                
                                            @endfor

                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-center"></td>
                                            <th class="text-center"></td>
                                            
                                                @for($date_cnt = 0;  $date_cnt <= $days_diff_cnt; $date_cnt++)

                                                <td class="text-center"> <b> IN </b></td>
                                                <td class="text-center"> <b> OUT </b></td>
                        
                                            @endfor


                                        </tr>

                                       @php 
                                           $attendance_index= 0;
                                       @endphp 

                                        @foreach($employees as $employee)

                                            <tr>
                                                <td> {{ $employee->employee_no }} </td>
                                                <td> {{ $employee->getFullName() }} </td>
                                                
                                                <!-- Day - Date Loop Column Per Employee -->

                                                @for($date_cnt = 0;  $date_cnt <= $days_diff_cnt; $date_cnt++)
                                                    
                                                    @php 
                                                        $cur_date = date('Y-m-d', strtotime('+'. $date_cnt . ' day'. $from_date));
                                                    @endphp
                                                
                                                    

                                                    <td>
                                                        <input type="time" name="sched_time_in[{{ $attendance_index }}]" value="@if(isset($attendance_arr[$cur_date][$employee->id]['sched_time_in'])){{$attendance_arr[$cur_date][$employee->id]['sched_time_in']}}@endif"> 

<!--                                                     
                                                        <input type="checkbox" name="attendance_is_late" class="py-2"/> Is Late

                                                        <input type="checkbox" name="attendance_is_absent" class="py-2"/> Is Absent -->

                                                    </td>

                                                    <td>
                                                        <input type="time" name="sched_time_out[{{ $attendance_index }}]" value="@if(isset($attendance_arr[$cur_date][$employee->id]['sched_time_out'])){{$attendance_arr[$cur_date][$employee->id]['sched_time_out']}}@endif">

                                                    </td>

                                                    <input type="hidden" name="employees_attendance_date[{{ $attendance_index }}]" value="{{ $cur_date }}" />

                                                    <input type="hidden" name="employees_ids[{{ $attendance_index }}]" value="{{ $employee->id }}" />
                                                   
                                                

                                                    @php ($attendance_index++)


                                                @endfor

                                            </tr>


                                        @endforeach
                        
                                    </tbody>
                                </table>

                            </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success" id="save_schedule_btn"> Save <i class="fa fa-save"></i></button>
                         </div>

                        <input type="hidden" value="{{ $attendance_index }}" name="attendance_index"/>
                        
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection