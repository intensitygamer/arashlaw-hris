
<!-- Create Payroll Headers Employee -->

<div class="modal fade " id='createPayrollHeadersModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="{{ route('payroll.create_headers') }}" method="POST">
            
            @csrf
 
            <div class="modal-header ">
                <h4 class="modal-title text-center"> Add Payroll Header </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                
                <div class="mb-3">

                    <label for="header_label" class="form-label" >Header Label</label>
                            
                    <input type="text" name="label" class="form-control"/> 
                     
                </div> 
 
                <div class="mb-3">

                    <label for="header_label" class="form-label" >Type</label>
                            
                    <select name="type" class="form-control">
                        <option value="earning">Earning</option>
                        <option value="premium">Premium</option>
                        <option value="deductible">Deductible</option>
                    </select>

                      
                </div> 

                <div class="mb-3">
                    
                    <label for="amount_type" class="form-label" >Amount Type</label>
                            
                    <select name="amount_type" class="form-control">
                        <option value="fixed">Fixed</option>
                        <option value="fillable">Fillable</option>
                        <option value="rate">Rate</option>
                    </select>

                </div> 
                
                <div class="mb-3 amount_rate_field_group" >
                
                    <label for="amount_rate" class="form-label" >Amount Rate</label>

                    <div class="input-group mb-3">
                        

                        <input type="number" min="1" max="100" name="amount_rate" class="form-control"/>
                        
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>

                    </div> 
    
                </div> 

                <div class="mb-3">
                    
                    <label for="rate_base_from" class="form-label" >Amount Rate Base From</label>
                            

                    <select name="rate_base_from" class="form-control">
                        <option value="basic_wage">Basic Wage</option>
                        <option value="total_earnings">Total Earnings</option>
                        <option value="gross">Gross</option>
                    </select>

                </div> 


            </div>

            <div class="modal-footer d-flex flex-row">
 
                <div class="p-2 ms-auto">   
                    <button type="submit" class="btn btn-success"> Save </button>
                 </div>

    
            </div>
            
            </form>

        </div>

    </div>
 
  </div>

  
<!-- Punch Out Employee -->



<div class="modal fade " id='punchOutModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="" method="POST">
            
            @csrf
 
            <div class="modal-header ">
                <h2 class="modal-title text-center"> Delete Employee</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <p class='text text-center'>  Are you sure you want to delete this employee? </p> 
            </div>

            <div class="modal-footer d-flex flex-row">
 
                <div class="p-2 ms-auto">   
                    <button type="submit" class="btn btn-danger"> Yes </button>
                 </div>

    
            </div>
    
        </div>

    </div>
 
  </div>
