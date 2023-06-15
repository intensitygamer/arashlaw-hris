 
@extends('layouts.dashboard')

@section('content')
 

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title"> Payroll Salary Calculator </strong>
        </div>
        <div class="card-body salary-calculator-container">

            <div class="row">
                
                <div class="col mb-2">

                <button class="btn btn-info"><i class="fa fa-list"></i></button>
                <button class="btn btn-info"><i class="fa fa-archive"></i></button>

                </div>

            </div>

                    <div class="row">

                        <div class="col ">
                            <label> <b> From Date: {{ date("M d, Y", strtotime($payroll->from_date)) }}</b></label>
                             
                        </div>

                        
                        <div class="col">
                            <label> <b> To Date: {{ date("M d, Y", strtotime($payroll->to_date))  }}</b></label>
                         </div>


                    </div>
<!-- 
                    <div class="row mt-2 mb-4">

                        <div class="col">

                            <label> <b> Department/s: </b></label>
                            
                            {!! department_field(array( 'name'=>'department_id', 'class' => 'form-control standardSelect')) !!}

                        </div> 


                    </div> -->

                    <table class="table table-striped table-bordered text-center"  id="payroll-generate-list">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <!-- <th class="col "  ></th> -->
                                <th class="col emp_payroll_name">Employee</th>
                                <th class="col">Total Hours Worked </th>
                                <th class="col">Basic Wage</th>
                                <th class="col">Hourly Rate</th>
                                <th class="col">Allowance</th>
                                <th class="col" >ND Hours</th>
                                <th class="col">Total ND Amount (10%)</th>
                                <th class="col">Absent</th>
                                <th class="col">LATES (in minutes) </th>
                                <th class="col">Total Regular OT Hours</th>
                                <th class="col">Restday OT</th>
                                <th class="col">SPECIAL HOLIDAY (HRS)</th>
                                <th class="col">LEGAL HOLIDAY (HRS)</th>
                                <th class="col">LEGAL HOLIDAY - NIGHT SHIFT (HRS)</th>
                                <th class="col">BACK PAY</th>
                                <th class="col">BONUS</th>
                                <th class="col">ALLOWANCE RATE PER DAY</th>
                                <th class="col">TOTAL ALLOWANCE PER PAYROLL</th>
                                <th class="col">OT Total Amount 25%</th>
                                <th class="col">RESTDAY OT Total Amount 169%</th>
                                <th class="col">HOLIDAY 30%</th>
                                <th class="col">HOLIDAY 100%</th>
                                <th class="col">HOLIDAY NS 120%</th>
                                <th class="col">SSS</th>
                                <th class="col">PHILHEALTH</th>
                                <th class="col">PAGIBIG</th>
                                <th class="col">Absent Amount</th>
                                <th class="col">TOTAL Deduction</th>
                                <th class="col">HOLI 30% </th>
                                <th class="col">HOLI  100% </th>
                                <th class="col">HOLIDAY NS 120% </th>
                                <th class="col">Gross Pay </th>
                                <th class="col">NET PAY </th>
                                <th class="col">  </th>
                                 
                                
                            </tr>
                        </thead>

                        @php 
                            $payroll_index = 0;

                        @endphp 

                        <tbody>

                            @foreach($emp_salary as $salary)


                            <tr class="employee_salary_row" >
                            
                            <!-- Employee Salary Edit / Delete -->
<!-- 
                                <td>
                                    <a href="#" class="text text-success employee_salary_edit" value="{{ $payroll_index }}">  
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <a href="#" class="text text-danger employee_salary_del">  
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td> -->
                            
                            <!-- Employee Name Wage -->

                                <th scope="row" class="emp_payroll_name">

                                    <div class="d-flex">

                                        <div class="px-2">

                                        <a href="#" class="text text-success employee_salary_edit"  data-salaryId="{{ $salary->id }}">  
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <a href="#" class="text text-danger employee_salary_del" value="{{ $payroll_index }}">  
                                            
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="text text-info employee_salary_attendance" value="{{ $salary->employee_info->id }}">  
                                            <i class="ti-clipboard"></i>
                                        </a>

                                        </div>


                                        <div class="px-2">
                                            {{ $salary->employee_info->getFullName() }} 
                                        </div>

                                    </div>
                                      
                                </th>

                                <td> <input type='text'  class="form-control hours_input_field" name="total_hours_worked[{{$salary->employee_info->id}}]" value="{{ number_format($salary->total_hours_worked, 1) }}" /> 
                                </td>
                                
                            <!-- Basic Wage -->

                                <td class="amount_input_field">

                                    <div class="input-group w-100">                    

                                        <span class="input-group-text">P</span>
                                         <input type='text' class="form-control basic_wage"  disabled name=""  value="{{ number_format($salary->employee_info->basic_wage, 2) }}"/> 
                                    </div>

                                </td>

                                <!-- Hourly Rate -->

                                <td class="amount_input_field">
                                    <div class="input-group w-100">                    

                                        <span class="input-group-text" >P</span>
                                         <input type='text' class="form-control  hourly_rate" disabled name=""  value="{{ number_format($salary->employee_info->basic_wage / 20 / 8, 2) }}"/> 
                                    </div>
                                </td>

                                <!-- Allowance -->

                                <td class="amount_input_field">
                                    <div class="input-group w-100">                    

                                        <span class="input-group-text" >P</span>
                                         <input type='text' class="form-control" disabled name=""  value="{{ number_format($salary->employee_info->allowance , 2) }}"/> 
                                    </div>
                                </td>

                                <!-- ND Hours -->  

                                <td > 
                                    <input type='text' name="nd_hours[{{$salary->employee_info->id}}]" class="form-control nd_hours_field hours_input_field" id="nd_hours_field_{{$salary->employee_info->id}}" value="{{ number_format($salary->nd_hours, 1) }}" /> 
                                </td>
                                
                                <!-- Total ND Amount (10%)	-->

                                <td class="amount_input_field">    
                                
                                    <div class="input-group w-100">         
                                                    
                                        <span class="input-group-text">P</span>
                                        <input type='number' class="form-control nd_differential_amount" id="nd_differential_amount_{{$salary->employee_info->id}}" name="nd_differential_amount[{{$salary->employee_info->id}}]"   value="{{ number_format($salary->total_nd_amount , 2) }}"  disabled />

                                    </div>
                                </td>

                                <!-- Absent Count Field	-->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control hours_input_field absent_cnt_field " id="absent_cnt_field_{{$salary->employee_info->id}}" value="{{ number_format($salary->absents, 0) }}" /> 
                                </td>
                                
                                <!-- Lates Count Field	-->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control hours_input_field absent_cnt_field " id="absent_cnt_field_{{$salary->employee_info->id}}" value="{{ $salary->late_minutes }}" /> 
                                </td>
                                

                                <!-- Total OT Hours Field	-->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control hours_input_field regular_ot_hours_field" id="absent_cnt_field_{{$salary->employee_info->id}}" value="{{ $salary->total_regular_ot_hours }}"/> 
                                </td>


                                <!-- Restday OT Field	-->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control hours_input_field restday_ot_hours_field" id="absent_cnt_field_{{$salary->employee_info->id}}" value="{{ number_format($salary->absents, 1) }}"/> 
                                </td>


                                <!-- SPECIAL HOLIDAY OT Field	-->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control hours_input_field restday_ot_hours_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                
                                <!-- LEGAL HOLIDAY Field	-->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control hours_input_field restday_ot_hours_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- LEGAL HOLIDAY - NIGHT SHIFT -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control hours_input_field restday_ot_hours_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                <!-- BACK PAY -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                <!-- BONUS -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field " id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- ALLOWANCE RATE PER DAY -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>



                                <!-- TOTAL ALLOWANCE PER PAYROLL -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- Regular OT Amount -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                <!-- RESTDAY OT -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- HOLIDAY 30% -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- HOLIDAY 100% -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                
                                <!-- HOLIDAY 120% -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                <!-- SSS  -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- PHILHEALTH  -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- PAGIBIG  -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- ABSENT TOTAL AMOUNT  -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>


                                <!-- RESTDAY OT 169%  -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                <!-- HOLI 30%  -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                <!-- HOLI 100%  -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                <!-- HOLIDAY NS 120% -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" /> 
                                </td>

                                
                                <!-- SUBTOTAL -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control gross_pay_field amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" value=0 /> 
                                </td>
 

                                <!-- NET PAY -->

                                <td> 
                                    <input type='text' name="absent_cnt_[{{$salary->employee_info->id}}]"  class="form-control amount_input_field" id="absent_cnt_field_{{$salary->employee_info->id}}" value=0 /> 
                                </td>

                                <!--  Buttons  -->

                                <td> 
                                    <form action="{{ route('salary.print') }}" method="get">
                                        @csrf 

                                        <button type="submit" class="btn btn-info"><i class="fa fa-print"></i></button>

                                        <input type="hidden" value="{{$salary->id}}" name="salary_id" />

                                    </form>        
                                 </td>  


                                <input type="hidden" value="{{$salary->employee_info->id}}" name="employees[]" />

                                @php 
                                    $payroll_index++;
                                @endphp 

                            @endforeach

                        </tbody>

                    </table>

                    <div class="row mt-4 ms-4 px-4 py-2">

                        <button class="btn btn-success ms-4" id="save-payroll-btn" type="button" style="margin-right: 15px;"> Save <i class="fa fa-save"></i></button>
                       
                        <form action = "{{ route('payroll.publish') }}" method="POST" id="payroll_publish_form">
                            
                            @csrf 

                            <button class="btn btn-primary" type="submit" > Publish Payroll <i class="fa fa-send"></i></button>

                            <input type="hidden" value="{{ $payroll_id }}" name="payroll_id" />

                        </form>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


@include('payroll.modals.edit_emp_salary')
@include('attendance.modals.employee_view')

@endsection