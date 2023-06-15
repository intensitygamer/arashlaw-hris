 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Schedule Plotting</strong>
                    </div>
                    <div class="card-body">
            
            <form action = '' method="GET">

                        <div class="row">

                            <div class="col col-8">
                                    

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
                                             
                                            @for($date_cnt = 0;  $date_cnt <= $days_diff_cnt; $date_cnt++)

                                                <th scope="col" colspan="1" class="text-center">  {{ date('D', strtotime("+". $date_cnt . " day". $from_date)) }} 
                                                    <br>  {{ date('m/d', strtotime("+". $date_cnt . " day". $from_date)) }}  <br>  
                                                </th>
                                                
                                            @endfor

                                        </tr>

                                    </thead>
                                    <tbody>
                                      

                                       @php 
                                           $attendance_index= 0;
                                       @endphp 

                                             <tr> 

                                                @for($date_cnt = 0;  $date_cnt <= $days_diff_cnt; $date_cnt++)
                                                    
                                                    @php 
                                                        $cur_date = date('Y-m-d', strtotime('+'. $date_cnt . ' day'. $from_date));
                                                    @endphp

                                                    @if(!isPast($cur_date) || $user_info->is_admin)

                                                        <td>
                                                           <div class="d-flex justify-content-center mb-2"> <label class="px-4 "><b> IN </b></label> <input type="time" name="sched_time_in[{{ $attendance_index }}]" value="@if(isset($schedule_arr[$cur_date][$employee->id])){{$schedule_arr[$cur_date][$employee->id]['sched_time_in']}}@endif" class="ms-2 form-control"> </div>

    <!--                                                     
                                                            <input type="checkbox" name="attendance_is_late" class="py-2"/> Is Late

                                                            <input type="checkbox" name="attendance_is_absent" class="py-2"/> Is Absent -->

                                                            <div class="d-flex justify-content-center"> <label class="px-4 "> <b> OUT </b> </label> <input type="time" name="sched_time_out[{{ $attendance_index }}]" value="@if(isset($schedule_arr[$cur_date][$employee->id])){{$schedule_arr[$cur_date][$employee->id]['sched_time_out']}}@endif" class="ms-2 form-control"> </div>

                                                        </td>
  
                                                        <input type="hidden" name="employees_attendance_date[{{ $attendance_index }}]" value="{{ $cur_date }}" />

                                                        <input type="hidden" name="employees_ids[{{ $attendance_index }}]" value="{{ $employee->id }}" />
                                                    @else 

                                                    <td>
                                                        @if(isset($schedule_arr[$cur_date][$employee->id]))
                                                            {{ time_formatter($schedule_arr[$cur_date][$employee->id]['sched_time_in']) }}
                                                        @endif

                                                    <td>
                                                        @if(isset($schedule_arr[$cur_date][$employee->id]))
                                                            {{ time_formatter($schedule_arr[$cur_date][$employee->id]['sched_time_out']) }}
                                                        @endif
                                                    
                                                    @endif 

                                                    @php ($attendance_index++)


                                                @endfor

                                            </tr>
 
                                    </tbody>
                                </table>

                            </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success" id="save_attendance"> Submit <i class="fa fa-check"></i> </button>
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