
<!-- Employee Salary Modal -->

<div class="modal fade " id='salaryComputationEditModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="{{ route('salary.save') }}" method="POST" id="emp_salary_form">
            
            @csrf
 
            <div class="card-header ">

                <h4 class="modal-title text-center"> 
                    
                    <span class="employee_salary_name"> </span> - Salary ({{ date("M d, Y", strtotime($payroll->from_date)) }}- {{ date("M d, Y", strtotime($payroll->to_date)) }}) 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </h4>

            </div>

            <div class="modal-body">

                <div class="row">

                        <div class="col col-3 mb-3">
                <button class="btn btn-info btn-sm calculate-salary mb-4" type="button" id=""> Calculate Salary <i class="fa fa-calculator"></i> </button>


                                            <!--     
                                                <div class="mb-3"> 
                                                    <h4>Khera Rodrigo</h4>
                                                </div>  
                                            -->

                        <div class="card">

                            <div class="card-header text-center">
                                <h4>Salary Info</h4>
                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label for="basic_wage" class="form-label" > Basic Wage </label>
                                            
                                    <input type="text" class="form-control" id= "edit_basic_wage" name="" readonly  value="" /> 

                                    <input type="hidden" name="basic_wage" readonly  value="" /> 
                                    
                                </div> 


                                <div class="form-group">

                                    <label for="hourly_rate" class="form-label" > Hourly Rate </label>
                                            
                                    <input type="text" name="" id= "edit_hourly_rate" class="form-control" readonly  value=""/> 
                                    
                                </div> 


                                <div class="form-group">

                                    <label for="edit_total_regular_hours_worked" class="form-label" > Total Regular Hours Worked </label>
                                        
                                    <input type="text" name="" id= "edit_total_regular_hours_worked" class="form-control input-s "  /> 
            
                                </div> 

                                <div class="form-group">

                                    <label for="nd_hours" class="form-label" > Night Differential Hours </label>
                                        
                                    <input type="text" name="nd_hours" id= "edit_nd_hours" class="form-control input-s"  /> 
            
                                </div> 

                                <div class="form-group">

                                    <label for="edit_total_hours_worked" class="form-label" > Total Hours Worked </label>
                                        
                                    <input type="text" name="total_hours_worked" id= "edit_total_hours_worked" class="form-control input-s" readonly /> 
            
                                </div> 


                         </div><!-- End Card -->

                    </div> 

                        <div class="card">
                            
                            <div class="card-header text-center">
                                <h4>Earnings</h4>
                            </div>

                            <div class="card-body">


                                <div class="mt-3">

                                    <label for="edit_allowance" class="form-label" > Allowance  </label>
                                            
                                    <input type="text" name="" class="form-control text-success" id= "edit_allowance" value="" readonly /> 
                                    
                                </div> 

                                <div class="mt-3">

                                    <label for="edit_allowance_rate_per_day" class="form-label" > Allowance Rate Per Day  </label>
                                            
                                    <input type="text" name="" class="form-control"  id= "edit_allowance_rate_per_day" value="" readonly /> 
                                    
                                </div> 

                                <div class="mt-3">

                                    <label for="edit_allowance_per_payroll" class="form-label" > Allowance Per Payroll  </label>
                                            
                                    <input type="text" name="" class="form-control text-success"  id= "edit_allowance_per_payroll" value="" readonly /> 
                                  
                                    <input type="hidden" name="allowance" value="" readonly /> 
                                    
                                </div> 

                                <div class="mt-3">

                                    <label for="edit_total_regular_work_hours_amount" class="form-label" > Total Basic Amount  </label>
                                            
                                    <input type="text" name="" class="form-control text-success"  id= "edit_total_regular_work_hours_amount" readonly /> 
                                    <input type="hidden" name="total_basic_wage_amount" value="" readonly >
                                </div> 


                                <div class="mt-3">

                                    <label for="total_nd_amount" class="form-label" > Total ND Amount (10%)  </label>
                                            
                                    <input type="text" name="" class="form-control text-success"  id= "edit_total_nd_amount" readonly /> 
                                    
                                    <input type="hidden" name="total_nd_amount" readonly />

                                </div> 


                                <div class="mt-3">

                                    <label for="sales_commission_amount" class="form-label" > Sales Commission  </label>
                                            
                                    <input type="text" name="sales_commission_amount" class="form-control text-success" id= "edit_sales_commission_amount"/> 
                                    
                                </div> 
                                
                                <div class="mt-3">

                                    <label for="special_bonus_amount" class="form-label" > Special Bonus  </label>
                                            
                                    <input type="text" name="special_bonus_amount" class="form-control text-success" id= "edit_special_bonus_amount"/> 
                                    
                                </div> 


                                <div class="mt-3">

                                    <label for="backpay_amount" class="form-label" > Back Pay Amount  </label>
                                            
                                    <input type="text" name="backpay_amount" class="form-control text-success" id= "edit_backpay_amount" /> 
                                    
                                </div> 

                                <div class="mt-3">

                                    <label for="backpay_notes" class="form-label" > Back Pay Notes  </label>
                                    
                                    <div class="mt-3 p-1">
                                            
                                        <textarea class="form-control" name="backpay_notes" id= "edit_backpay_notes"></textarea>

                                    </div> 

                                </div> 



                            </div> 
                        
                        </div> <!-- End Card -->


            </div> 


            <div class="col col-3 mb-3 mt-3">

 
                    <div class="card">
                                
                        <div class="card-header text-center">
                            <h4>Deductibles</h4>
                        </div>

                        <div class="card-body">


                                <label for="absents" class="form-label" > Absents </label>
                                
                                <div class="row g-1">

                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="absents" id="edit_absent_hours_cnt" placeholder="">
                                        </div>
                                    </div>
                                 </div>

                                

                            <div class="form-group mt-2">

                                <label for="lates" class="form-label" > Lates </label>
          
                                <div class="row g-1">

                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text"  class="form-control" id="edit_late_hours" placeholder="">
                                            <div class="input-group-text">h</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                      <div class="input-group">
                                        <input type="text" class="form-control" id="edit_late_mins" placeholder="">
                                        <div class="input-group-text">m</div>
                                      </div>

                                    </div>

                                 </div>

                                 <input type="hidden" id="edit_total_late_minutes" name="late_minutes" />

                            </div> 
                            
                            <div class="form-group">

                                <label for="undertime" class="form-label" > Undertime </label>
                                        
                                <div class="row g-1">

                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_undertime_hours" placeholder="">
                                            <div class="input-group-text">h</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                      <div class="input-group">
                                        <input type="text" class="form-control" id="edit_undertime_mins" placeholder="">
                                        <div class="input-group-text">m</div>
                                      </div>

                                    </div>

                                </div>

                                 <input type="hidden" id="edit_total_undertime_minutes" name="undertime_minutes" />

                            </div> 

<!-- 
                            <div class="form-group">

                                <label for="withholding_tax" class="form-label" > Withholding Tax </label>
                                        
                                <input type="text" name="withholding_tax" class="form-control" id= "edit_withholding_tax"/> 
                                
                            </div>  -->

                        </div> 

                    </div> <!-- End Card -->
                    
                    <div class="card">
                        
                        <div class="card-header text-center">
                            <h4>Overtime & Holidays</h4>
                        </div>

                        <div class="card-body">

                            <div class="form-group">

                                <label for="total_regular_ot_hours" class="form-label" > Total Regular OT Hours </label>
                                        
                                <input type="text" name="total_regular_ot_hours" class="form-control"  id= "edit_regular_ot_hours" /> 
                                
                            </div> 
                
                            
                            <div class="form-group">
                
                                <label for="restday_ot" class="form-label" > Restday OT Hours </label>
                                        
                                <input type="text" name="restday_ot" class="form-control" id= "edit_restday_ot_hours" /> 
                                
                            </div> 
                
                
                            <div class="form-group">
                
                                <label for="special_holiday_hours" class="form-label" > SPECIAL HOLIDAY Hours </label>
                                        
                                <input type="text" name="special_holiday_hours" class="form-control"  id= "edit_special_holiday_hours" /> 
                                
                            </div> 
                
                            
                            <div class="form-group">
                
                                <label for="legal_holiday_hours" class="form-label" > LEGAL HOLIDAY Hours </label>
                                        
                                <input type="text" name="legal_holiday_hours" class="form-control" id= "edit_legal_holiday_hours"/> 
                                
                            </div>

                            <div class="form-group">
                
                                <label for="legal_holiday_ns_hours" class="form-label" > LEGAL HOLIDAY Night Differential Hours </label>
                                        
                                <input type="text" name="legal_holiday_ns_hours" class="form-control" id= "edit_legal_holiday_ns_hours"/> 
                                
                            </div>

                            <div class="form-group">
                
                                <label for="paid_leave_count" class="form-label" > Paid Leaves </label>
                                        
                                <input type="text" name="paid_leave_count" class="form-control" id= "edit_paid_leaves_cnt"/> 
                                
                            </div>

                        </div>

                    </div> <!-- End Card -->


                </div> <!-- End Column -->
 

                <div class="col col-3 mb-3 mt-3">
                    
                        <div class="card">
                            
                            <div class="card-header text-center">
                                <h4>Deduction Amounts</h4>
                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label for="total_absent_amount" class="form-label" > Absent  </label>
                                            
                                    <input type="text" name="" id="absent_amount_hours" class="form-control deductions-amount-label" readonly /> 
                                    
                                    <input type="hidden" name="total_absent_amount" readonly /> 
                                    
                                </div> 

                                <div class="form-group">

                                    <label for="total_late_amount" class="form-label" > Lates </label>
                                            
                                    <input type="text" name="" id="late_amount_hours" class="form-control deductions-amount-label" readonly /> 
                                    <input type="hidden" name="total_late_amount" readonly /> 

                                </div> 
                                
                                <div class="form-group">

                                    <label for="total_undertime_amount" class="form-label" > Undertime </label>
                                            
                                    <input type="text" name="" id="undertime_amount_hours"  class="form-control deductions-amount-label" readonly /> 
                                    <input type="hidden" name="total_undertime_amount" readonly /> 

                                </div> 

                            </div> 

                        </div> <!-- End Card -->
  
                        <div class="card">
                        
                            <div class="card-header text-center">
                                <h4>Overtime & Holidays Amount</h4>
                            </div>
    
                            <div class="card-body">
    
                                <div class="form-group">
    
                                    <label for="edit_regular_ot_amount" class="form-label"> Total Regular OT (25%)</label>
                                            
                                    <input type="text" name="" class="form-control text-success" id="edit_regular_ot_amount" readonly > 
                                    
                                    <input type="hidden" name="regular_ot_total_amount" readonly /> 

                                </div> 
                    
                                
                                <div class="form-group">
                    
                                    <label for="restday_ot" class="form-label"> Restday OT  (169%) </label>
                                            
                                    <input type="text" name="" class="form-control text-success"  id="edit_restday_ot_amount" readonly > 
                                    <input type="hidden" name="restday_ot_total_amount" readonly /> 

                                </div> 
                    
                    
                                <div class="form-group">
                    
                                    <label for="legal_holiday_hours" class="form-label"> SPECIAL HOLIDAY (30%) </label>
                                            
                                    <input type="text" name="" class="form-control  text-success"  id="edit_special_holiday_amount" readonly > 
                                    
                                    <input type="hidden" name="special_holiday_amount" readonly /> 

                                </div> 
                    
                                
                                <div class="form-group">
                    
                                    <label for="legal_holiday_amount" class="form-label"> LEGAL HOLIDAY (100%) </label>
                                            
                                    <input type="text" name="" class="form-control  text-success" id="edit_legal_holiday_amount" readonly > 
                                 
                                    <input type="hidden" name="legal_holiday_amount" readonly /> 

                                </div>
    
                                <div class="form-group">
                    
                                    <label for="legal_holiday_ns_amount" class="form-label"> LEGAL HOLIDAY - NIGHT SHIFT (130%) </label>
                                            
                                    <input type="text" name="" class="form-control  text-success" id="edit_legal_holiday_ns_amount" readonly > 
                                   
                                    <input type="hidden" name="legal_holiday_ns_amount" readonly /> 

                                </div>
    
                            </div>
    
                        </div> <!-- End Card -->
                
 
                </div> <!-- End Column -->

                    
                <div class="col col-3 mb-3 mt-3">
                    
                    <div class="card">
                        
                        <div class="card-header text-center">
                            <h4>Government Contributions</h4>
                        </div>

                        <div class="card-body">

                            <div class="mt-3">

                                <label for="sss_amount" class="form-label" > SSS </label>
                                        
                                <input type="text" name="sss_amount" class="form-control text-danger"  id="sss_deduction_amount"/> 
                                
                            </div> 

                            
                            <div class="mt-3">

                                <label for="philhealth_amount" class="form-label" > PHILHEALTH </label>
                                        
                                <input type="text" name="philhealth_amount" class="form-control text-danger" id="philhealth_deduction_amount"/> 
                                
                            </div> 


                            
                            <div class="mt-3">

                                <label for="pagibig_amount" class="form-label" > PAGIBIG </label>
                                        
                                <input type="text" name="pagibig_amount" class="form-control text-danger" id="pagibig_deduction_amount"/> 
                                
                            </div> 


                        </div> 

                    </div> <!-- End Card -->


                    <div class="card">
                        
                        <div class="card-header text-center">
                            <h4>Totals</h4>
                        </div>

                        <div class="card-body">
                             
                            <div class="mt-3">

                                <label for="edit_total_earnings" class="form-label"  > Total (Gross) Earnings </label>
                                        
                                <input type="text" name="" class="form-control text-info" id="edit_total_earnings" readonly /> 
                                <input type="hidden" name ="gross_pay_amount" readonly />
                            </div> 


                            <div class="mt-3">

                                <label for="edit_total_deductions" class="form-label" >Total Deductions </label>
                                        
                                <input type="text" name="" class="form-control deductions-amount-label" id="edit_total_deductions" value="" readonly /> 
                                <input type="hidden" name ="total_deduction_amount" readonly />

                            </div> 


                            
                            <div class="mt-3">

                                <label for="netpay_amount" class="form-label" > Net Pay </label>
                                        
                                <input type="text" name="" class="form-control text-success" id="edit_net_pay" readonly /> 

                                <input type="hidden" name ="netpay_amount" readonly />

                            </div> 


                        </div> 

                    </div>  <!-- End Card -->

                    <div class="card">
                        
                        <div class="card-header text-center">
                            <h4>Notes</h4>
                        </div>

                        <div class="mt-3 p-2">
                                  
                            <textarea class="form-control" name="salary_notes"></textarea>
                            
                        </div> 

                    </div>  <!-- End Card -->


                </div ><!-- End Column -->

                <!-- Hidden Fields -->
            


            </div><!-- End Row -->

            <div class="modal-footer d-flex flex-row">

                <input type="hidden" name="salary_id" value="" id="edit_salary_id"/>
                
                <button class="btn btn-info calculate-salary" type="button" id=""> Calculate Salary <i class="fa fa-calculator"></i> </button>
                <button class="btn btn-success" type="submit" > Save <i class="fa fa-save"></i> </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>
     

        </div>
    
        </form>
    
    </div>
    
    </div>

 </div>
