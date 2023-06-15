 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Schedule Plotting - {{ $employee->first_name . ' ' . $employee->last_name }} </strong>
                    </div>

                    <div class="card-body">
                
                <form action = '' method="GET">
 
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
             

                        </div>

                    </div>

                    <div class="row">
                        <div class="col col-2">

                            <button type="submit" class="btn btn-success mb-2"> Apply Filter <i class="fa fa-filter"></i> </button>
                        
                        </div>
                    </div>

                    <input type="hidden" name="employee_id" value="{{ $employee->id }}" />

            </form>
                    
            <form action = "{{ route('agent.schedule.update') }}" method="POST" id="save_attendance_form">

                         @csrf    

                            <div class="employee-list-table-container">

                                <table class="table table-striped" id="" style="width: 70%">
                                    <thead>
    
                                        <tr>
                                            <td class="text-center"> <b> Date </b></td>
                                            <td class="text-center"> <b> IN </b></td>
                                            <td class="text-center"> <b> OUT </b></td>

                                    </thead>

                                    <tbody>
                                    

                                    @php 
                                        $attendance_index= 0;
                                    @endphp 
                                 
                                    @foreach($schedule as $schedule_row)
                                                
                                        <tr>

                                                <td class="text-center"> 
                                                    {{ date('D', strtotime($schedule_row->attendance_date)) }} <br>
                                                    {{ date('m/d', strtotime($schedule_row->attendance_date)) }} 
                                                </td>
                                                <td class="text-center">
                                                    <input type="time" name="sched_time_in[{{ $schedule_row->id }}]" value="{{ $schedule_row->sched_time_in }}"> 
<!--                                                     
                                                    <input type="checkbox" name="attendance_is_late" class="py-2"/> Is Late

                                                    <input type="checkbox" name="attendance_is_absent" class="py-2"/> Is Absent -->

                                                </td>


                                                <td class="text-center">
                                                    <input type="time" name="sched_time_out[{{ $schedule_row->id }}]" value="{{ $schedule_row->sched_time_out }}">

                                                </td>

                                                <input type="hidden" name="employees_attendance_date[{{ $schedule_row->id }}]" value="{{ $schedule_row->attendance_date }}" />
                                                
                                        </tr>

                                        @php 
                                            ($attendance_index++)
                                        @endphp

                                    @endforeach
                        
                                    </tbody>

                                </table>

                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success" id="save_attendance"> Save <i class="fa fa-save"></i></button>
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