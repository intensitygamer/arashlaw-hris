 
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

<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            Welcome to the Employee Dashboard! <br> Good Luck Have Fun!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        @if($current_attendance && $current_attendance->time_out == NULL)

            <div class="row">     
                

                <div class="p-4">           

                @if(!$current_attendance->time_in)


                    <form id ="punch-in-form" class="log-form">

                        @csrf

                        <button type="submit" class="btn btn-info clock-in-btn" id="clock_in"  value=1>
                        Clock In <i class="fa fa-clock"></i>
                        </button>

                        <input type="hidden" name="clock_in" value=1 />

                    </form>

                @endif
                
                </div>

                <div class="px-2">


                    <form id ="lunch-in-form" class="log-form">
                        
                        @csrf

                        <button type="submit" class="btn btn-info lunch-btn" id="lunch_in" name="lunch_in" value=1>
                            Lunch <i class="fa fa-clock"></i>
                        </button>

                        <input type="hidden" name="lunch_in" value=1/>
                        
                    </form>

                
                </div>
                


                    <div class="px-2">    

                        <form id ="back-form" class=" back-form log-form">
                            
                            @csrf

                            <button type="submit" class="btn btn-danger back-lunch-btn back-btn" >
                                Back (Lunch) <i class="fa fa-clock"></i>
                            </button>

                            <input type="hidden" name="lunch_out" value=1/>

                        </form>

                    </div>
                    
                <div class="px-2">    

                         
                        <form id ="break1-form" class="log-form">

                            @csrf

                            <button type="submit" class="btn btn-info break1-btn " >
                                Break 1 <i class="fa fa-clock"></i>
                            </button>

                            <input type="hidden" name="break1" value=1/>

                        </form>

 
 
                        <form class="back-form log-form">

                            @csrf

                            <button type="submit" class="btn btn-info back-break1-btn back-btn" >
                                Back (Break 1)  <i class="fa fa-clock"></i>
                            </button>

                            <input type="hidden" name="break1_back" value=1/>

                        </form>
                        
 
                </div>
                
                <div class="px-2">

 
                        <form id ="break2-form" class="log-form">

                            @csrf
                            <button type="submit" class="btn btn-info break2-btn" >
                                Break 2 <i class="fa fa-clock"></i>
                            </button>

                            <input type="hidden" name="break2" value=1/>

                        </form>

                     <form class="back-form log-form">

                        @csrf
                        <button type="submit" class="btn btn-info back-break2-btn back-btn" >
                        Back (Back 2) <i class="fa fa-clock"></i>
                        </button>

                        <input type="hidden" name="break2_back" value=1/>

                    </form>

 
                </div>

                <div class="px-2">


                        <form id ="clockout-form"  class="log-form">

                            @csrf
                            <button type="submit" class="btn btn-danger clock-out-btn " >
                                Clock Out <i class="fa fa-clock"></i>
                            </button>

                            <input type="hidden" name="clock_out" value=1/>

                        </form>
                    

                    <input type="hidden" value="{{ $current_attendance->id ?? '' }}" id="attendance_id" />


                </div>

                
                </div>
 

                <div class="row punch-timer-container m-4">
                    <h4> <span class="text punch-timer-label"></span> <span class="text text-danger punch-timer"> </span> </h4> 
                </div>

            </div>

    
        @elseif($current_attendance && $current_attendance->time_out != NULL)

            <p class='text text-info'> Goodbye ! Sayonara, see you next shift! </p> 

        @endif

        <div class="row"> 

            @if($current_attendance)

            <div class="col-sm-12 "> 

            <div class="card"> 

                <div class="card-header">
                    <div class="pull-left">
                        <strong class="card-title">  
                            <h4 class=""> Today's Shift:  
                                <span class="text"> {{ date_formatter($current_attendance->attendance_date) }} 
                                    <span class="text text-success"> 
                                        ({{ time_formatter($current_attendance->sched_time_in)  }} - {{ time_formatter($current_attendance->sched_time_out)  }}) 
                                    </span>
                                </span>  
                            </h4>
                        </strong>
                    </div>
                </div>
                
                     

                <div class="col-sm-12">
<!-- 
                    <table class="table table-condensed m-4">                        

                        <tr>
                            <td><p class="text"> <b> Time In:  </b>  </p></td>
                            <td> <b> {{ time_formatter($current_attendance->sched_time_in)  }}  </b> </td>
                        </tr>

                        <tr>

                            <td><p class="text"><b> Time Out: </b> </p></td>
                            <td>{{ time_formatter($current_attendance->sched_time_out)  }}  </td>
                        </tr>

                    </table> -->

            
                </div>
                
                <div class="col-sm-12  p-4"> 

                    <table class="table table-condensed table-bordered table-centered justify-content-center text-center">
                        <thead>
                            <tr>
                                <th>Clock In </th>
                                <th>Lunch  </th>
                                <th>Back Lunch </th>
                                <th>Break 1 </th>
                                <th>Break 1 Back </th>
                                <th>Break 2 </th>
                                <th>Break 2 Back </th>
                                <th>Clock Out </th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            @php 
                                $late_in_minutes        = late_in_minutes($current_attendance->time_in, $current_attendance->sched_time_in);
                                $undertime_in_minutes   = undertime_in_minutes($current_attendance->time_out, $current_attendance->sched_time_out);
                            @endphp 

                            <tr>
                                <td class="clock-in"> {{ time_formatter($current_attendance->time_in) }} 

                                    @if($late_in_minutes > 15)
                                        {!! late_in_minutes_display($late_in_minutes) !!}
                                    @endif 

                                </td>
    
                                <td class="lunch"> {{ time_formatter($current_attendance->lunch_in) }} </td>
                                <td class="back-lunch">{{ time_formatter($current_attendance->lunch_out) }}  </td>
                                <td class="break1"> {{ time_formatter($current_attendance->break1) }} </td>
                                <td class="break1-back"> {{ time_formatter($current_attendance->break1_back) }}  </td>
                                <td class="break2"> {{ time_formatter($current_attendance->break2) }}  </td>
                                <td class="break2-back">{{ time_formatter($current_attendance->break2_back) }}  </td>
                                <td class="clock-out"> {{ time_formatter($current_attendance->time_out) }}  
                                
                                    @if($undertime_in_minutes)
                                        {!! undertime_in_minutes_display($undertime_in_minutes) !!}
                                    @endif 
                                        
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <input type="hidden" id="current_attendance_id" value="{{ ($current_attendance->id) }}" name="" />
                    <input type="hidden" id="current_attendance_time_in" value="{{ ($current_attendance->time_in) }}" name="" />
                    <input type="hidden" id="current_attendance_lunch_in" value="{{ ($current_attendance->lunch_in) }}" name="" />
                    <input type="hidden" id="current_attendance_lunch_out" value="{{ ($current_attendance->lunch_out) }}" name="" />
                    <input type="hidden" id="current_attendance_break1" value="{{ ($current_attendance->break1) }}" name="" />
                    <input type="hidden" id="current_attendance_break1_back" value="{{ ($current_attendance->break1_back) }}" name="" />
                    <input type="hidden" id="current_attendance_break2" value="{{ ($current_attendance->break2) }}" name="" />
                    <input type="hidden" id="current_attendance_break2_back" value="{{ ($current_attendance->break2_back) }}" name="" />
                    <input type="hidden" id="current_attendance_time_out" value="{{ ($current_attendance->time_out) }}" name="" />
      

                </div>

                @else

                <div class="col col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" > 
                        No available schedule for today ! 
                    </div>
                </div>
                
             
            @endif 

            </div>

            </div>
        </div>

        </div>
        
        @if($current_attendance)

            <div class="row p-4"> 
                <div class="col-sm-12 "> 

                    <div class="card">

                    <div class="card-header">
                        <div class="pull-left">
                            <strong class="card-title">This Week Schedule</strong>
                         </div>
                    </div>

                    <table class="table table-condensed table-bordered text-center table-centered justify-content-center text-center" id="current-week-sched-tbl">
                        <thead>
                            <tr>
                                <th> Date </th>
                                <th> Schedule Time In  </th>
                                <th> Schedule Time Out </th>
                                <th> Lunch Time </th>
                                <th> Total Break Time </th>
                                <th> Total Work Hours </th>
    
                            </tr>
                        </thead>

                    </table>

                </div>

                </div>
            </div>
        
        @endif 

    </div>


        <!-- /# card -->
    </div>


</div> <!-- .content -->

<!-- Continue Timer if user is still on break -->

@php

    $last_attendance_log = $employee_info->last_attendance_log;
    $attendance_info     = $current_attendance;

@endphp

@if($current_attendance) 

<script>

    var last_attendance_log;
    var attendance_info;
        
        jQuery(document).ready(function() {

            jQuery(".clock-out-btn").hide()

            
            jQuery(".back-lunch-btn").hide();
            jQuery(".back-break1-btn").hide();
            jQuery(".back-break2-btn").hide();
                jQuery(".lunch-btn").hide();
                jQuery(".break1-btn").hide();
                jQuery(".break2-btn").hide();

                last_attendance_log = "{{ $last_attendance_log }}";
                
                let current_attendance     = {
                    break1: "{{ ($current_attendance->break1) }}",
                    break2: "{{ ($current_attendance->break2) }}",
                    lunch_in: "{{ ($current_attendance->lunch_in) }}",
                    lunch_out: "{{ ($current_attendance->lunch_out) }}",
                    break2_back: "{{ ($current_attendance->break2_back) }}",
                    break1_back: "{{ ($current_attendance->break1_back) }}",
                    time_in: "{{ ($current_attendance->time_in) }}",
                    time_out: "{{ ($current_attendance->time_out) }}"
                };

                console.log(current_attendance);


                if(current_attendance.time_in != '' ){
                    jQuery(".clock-in-btn").hide();
                        
                    if(current_attendance.time_out == '' ){
                        jQuery(".clock-out-btn").show();
                    }

                    if(current_attendance.lunch_in == '' ){
                        jQuery(".lunch-btn").show();

                    }

                    if(current_attendance.break1 == '' ){
                        jQuery(".break1-btn").show();

                    }
                    
                    if(current_attendance.break2 == '' ){
                        jQuery(".break2-btn").show();

                    }

                }

                if(current_attendance.lunch_in != '' ){
                    jQuery(".lunch-btn").hide();
                    
                    if(current_attendance.lunch_out == ''){
                        jQuery(".back-lunch-btn").show();
                    }
                }

                if(current_attendance.break1 != ''){
                    jQuery(".break1-btn").hide();
                    
                    if(current_attendance.break1_back == ''){
                        jQuery(".back-break1-btn").show();
                    }

                }

                if(current_attendance.break2 != ''){
                    jQuery(".break2-btn").hide();
                    
                    if(current_attendance.break2_back == ''){
                        jQuery(".back-break2-btn").show();
                    }
                }

                if(last_attendance_log == 'Lunch' || last_attendance_log == 'Break 1' || last_attendance_log == 'Break 2'){

                    timestamp_in = "{{ get_break_type($current_attendance, $last_attendance_log)  }}";

                    jQuery(".punch-timer-label").html(last_attendance_log + ": ");

                    countdownTimer = setInterval(punch_timer, 1000);

                    jQuery(".clock-out-btn").hide();

                }

            });


    </script>

@endif 

@endsection
 

 