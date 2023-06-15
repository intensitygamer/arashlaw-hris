 
@extends('layouts.dashboard')

@section('content')
 
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Employee Attendance </strong>
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
                                    <table class="table">
    
                                        <tr><td><b> Employee </b> </td>  
                                            <td>{!! employees_field(array('class' => 'form-control standardSelect' ,  'multiple' => '', 'name' => 'employee')) !!}
 
                                        </td>
    
    
                                        <tr><td><b> Department </b> </td>  
                                            <td>{!! department_field(array('class' => 'form-control standardSelect')) !!}

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
            </div>
         
        </div>

        <div class="card">
            <div class="card-header">
                <strong class="card-title">  </strong>
            </div>
            <div class="card-body">

                    
                    @foreach($employees as $employee)
                                
                        <div class="col col-6">

                            <h4 class="mb-2 mt-2 text-center"> {{ $employee->getFullName() }} </h4>
                            
                            <table class="table text-center">

                                <thead class="thead-dark">
                                    <tr>
                                        <th>Date</td>
                                        <th>IN</td>
                                        <th>OUT</td>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($attendance_arr[$employee->id] as $attendance)
                                        
                                        @if(isset($attendance['attendance_date']))

                                        <tr>
                                            <td>{{ date("M d", strtotime($attendance['attendance_date'])) }}</td>
                                            <td>{{ $attendance['time_in'] }}</td>
                                            <td>{{ $attendance['time_out'] }}</td>
                                            
                                        </tr>
                                        
                                        @endif 

                                    @endforeach 
                                    
                                </tbody>

                            </table>
                        
                        </div>                                                            

                        @endforeach 


             </div>

            </div>

        </div>

        </div>

    </div>

</div>

@endsection