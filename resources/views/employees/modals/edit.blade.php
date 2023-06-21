
<!-- Edit Employees -->

<div class="modal fade " id='editEmployeesModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action = "{{ route('employee.update') }}" method="POST" id="save_employee_form">
            
            @csrf
 

            <div class="modal-header ">
                <h4 class="modal-title text-center">Edit Employee Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">

                        <div class="col col-md-4 col-sm-12">
                           
                            <div class="card">

                                <div class="card-header">

                                    <h4> <b> Personal Details </b> </h4>
                                    
                                </div>

                                <div class="card-body">

                                    <div class="mb-3 mt-4">
                                        <label for="firstName_field" class="form-label"> First Name </label>
                                        <input type="text" class="form-control" id="firstName_field" name="first_name" value="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="middleName_field" class="form-label"> Middle Name </label>
                                        <input type="text" class="form-control" id="middleName_field" name="middle_name" value="">
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="lastName_field" class="form-label"> Last Name </label>
                                        <input type="text" class="form-control" id="lastName_field" name="last_name" value="">
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="email_field" class="form-label"> Email </label>
                                        <input type="email" class="form-control" id="email_field" name="email" value="">
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="birthdate_field" class="form-label"> Birth Date </label>
                                        <input type="date" class="form-control" id="birthdate_field" name="birth_date" value="">
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="gender_field" class="form-label"> Gender </label>
                                        <select name="gender" id="gender_field" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="">Undecided</option>
                                        </select>
                                    </div>
                    
                
                                    <div class="mb-3">

                                        <label for="address_field" class="form-label"> Address </label>
                                        
                                        <textarea class="form-control" id="address_field" name="address" style="resize: none;"></textarea>

                                    </div>

                                    <h4> <b> Emergency Details </b> </h4>

                                    <div class="mb-3 mt-4">

                                        <label for="emergency_contact_person_field" class="form-label"> Contact Person </label>
                                        
                                        <input type="text" class="form-control" id="emergency_contact_person_field" name="emergency_contact_person" value="">

                                    </div>

                                    <div class="mb-3">

                                        <label for="emergency_contact_number_field" class="form-label"> Contact Person Number </label>
                                        
                                        <input type="text" class="form-control" id="emergency_contact_number_field" name="emergency_contact_number" value="">

                                    </div>

                                </div>

                            </div>

                        </div>


                    <div class="col col-md-4 col-sm-12">

                        <div class="card">

                            <div class="card-header">

                                <h4> <b> Work Info </b> </h4>
                                
                            </div>

                            <div class="card-body">

                                <div class="mb-3 mt-4">
                                    <label for="employeeNumber_field" class="form-label"> Employee Number </label>
                                    <input type="text" class="form-control" id="employeeNumber" name="employee_no" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="job_title_field" class="form-label"> Job Title </label>
                                    <select name="job_title_id" id="job_title_field" class="form-control">
                                        <option>Select Job Title</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="">Undecided</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="companyEmail_field" class="form-label"> Company Email </label>
                                    <input type="email" class="form-control" id="companyEmail_field" name="companyEmail" value="">
                                </div>
                
                                <div class="mb-3">

                                    <label for="startDate_field" class="form-label" >Start Date</label>
                                    
                                    <input type='date' name="start_date" id="startDate_field" class="form-control" value=''  />
            
                                </div> 


                                <div class="mb-3">

                                    <label for="hiredDate_field" class="form-label" > Hired Date</label>
                                    
                                    <input type='date' name="hired_date" id="hiredDate_field" class="form-control" value=''  />
            
                                </div> 

                                <div class="mb-3">

                                    <label for="workshift_field" class="form-label" > Work Shift</label>
                                    
                                    <select class="form-control" name="work_shift">
                                        <option value="custom_shift"> Custom Shift </option>
                                        <option value="flexible_shift"> Flexible Shift </option>
                                        <option value="1">Morning Shift (6:00 AM) - (3:00 PM)</option>
                                        <option value="">Night Shift (9:00 PM) - (6:00 AM) </option>
                                    </select>

                                </div> 


                                <div class="mb-3 custom_shift_field_group">
                                    
                                    <b>Custom Shift</b><br>

                                    <label for="workshift_field" class="form-label mt-2" > Time In </label>
                                            <input type="time" class="form-control" />
                                    
                                    <label for="workshift_field" class="form-label mt-2" > Time Out </label>
                                                <input type="time" class="form-control" />

                                </div> 

                            </div>

                        </div>
    
                    </div>

                    <div class="col col-md-4 col-sm-12">

                        <div class="card">

                            <div class="card-header">

                                <h4> <b> Government Details </b> </h4>
                                
                            </div>

                        <div class="card-body">
                            
                            <div class="mb-3 mt-4">

                                <label for="sss_field" class="form-label" > SSS </label>
                                
                                <input type='text' name="sss_no" id="sss_field" class="form-control" value=''  />
        
                            </div> 

                            <div class="mb-3">

                                <label for="pagibig_field" class="form-label" > Pag- Ibig ID </label>
                                
                                <input type='text' name="pagibig_id" id="pagibig_field" class="form-control" value=''  />
        
                            </div> 


                            <div class="mb-3">

                                <label for="philhealth_field" class="form-label" > Philhealth </label>
                                
                                <input type='text' name="philhealth_id" id="philhealth_field" class="form-control" value=''  />
        
                            </div> 

                            
                            <div class="mb-3">

                                <label for="tin_field" class="form-label" > TIN ID </label>
                                
                                <input type='text' name="tin_id" id="tin_field" class="form-control" value=''  />
        
                            </div> 

                            <div class="mb-2">
                            </div> 

                            <h4 class="mt-4 mb-4"> Payroll Fix Amount Headers</h4>

                            @foreach($payroll_headers as $payroll_header) 
                            
                                <div class="mb-4">

                                    <label for="payroll_header_field_{{ $payroll_header->id }}" class="form-label" > {{ $payroll_header->label }} </label>
                                
                                    <input type='text' name="payroll_header[$payroll_header->id]" id="payroll_header_field_{{ $payroll_header->id }}" value=""  class="form-control" />
        
                                </div> 
                                
                            @endforeach 

                        </div>

                    </div>

                </div>

            </div>



            <div class="modal-footer d-flex flex-row">
 
                 <div class="p-2 ms-auto">   
                    <button type="submit" class="btn btn-success lead-save-btn"> <i class="fa fa-save"></i> Save </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                 </div>

            </div>

            </div>

        </form>

      </div>

    </div>

  </div>

  