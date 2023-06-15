 
@extends('layouts.dashboard')

@section('content')


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Current Shift</strong>
                    </div>
                    
                    <div class="card-body">

                        include('attendance.filters')

                    </div>

                    <div class="row">
                        <div class="col col-2">

                            <button type="submit" class="btn btn-success mb-2"> Apply Filter <i class="fa fa-filter"></i> </button>
                        
                        </div>
                    </div>
                    
                    </form>
                    
                    <form action = "{{ route('attendance.update') }}" method="POST" id="save_attendance_form">

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

                                                @for($date_cnt = 0;  $date_cnt <= $days_diff_cnt; $date_cnt++)

                                                    <td><input type="time" name="time_in[{{ $attendance_index }}]" value="@if(isset($attendance_arr[date('Y-m-d', strtotime("+". $date_cnt . " day". $from_date))])){{$attendance_arr[date('Y-m-d', strtotime("+". $date_cnt . " day". $from_date))][$employee->id]['time_in']}}@endif"> </td>
                                                    <td><input type="time" name="time_out[{{ $attendance_index }}]" value="@if(isset($attendance_arr[date('Y-m-d', strtotime("+". $date_cnt . " day". $from_date))])){{$attendance_arr[date('Y-m-d', strtotime("+". $date_cnt . " day". $from_date))][$employee->id]['time_out'] }}@endif"> </td>

                                                    <input type="hidden" name="employees_attendance_date[{{ $attendance_index }}]" value="{{ date('Y-m-d', strtotime("+". $date_cnt . " day". $from_date)) }}" />

                                                    <input type="hidden" name="employees_ids[{{ $attendance_index }}]" value="{{ $employee->id }}" />
                                                    
                                                    @php ($attendance_index++)

                                                @endfor

                                            </tr>

                                        @endforeach
                        
                                    </tbody>
                                </table>

                            </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success" id="save_attendance"> Save <i class="fa fa-save"></i></button>
                            <button type="submit" class="btn btn-info">Generate Payroll <i class="fa fa-money"></i></button>
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