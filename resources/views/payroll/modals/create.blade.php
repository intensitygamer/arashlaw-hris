
<!-- Create Payroll Modal -->

<div class="modal fade " id='addPayrollModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="{{ route('payroll.create') }}" method="POST" id="payroll-create-submit">
            
            @csrf
<!--  
            <div class="modal-header ">
                <h4 class="modal-title text-center"> Edit Payroll </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> -->

            <div class="modal-body">
                 

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"> Add Payroll </strong>
                        </div>                               

                        <div class="card-body">
                        
                
                
                                    @csrf 
                                    
                                    <div class="row">
                
                                        <div class="col ">
                                            <label> <b> From Date: </b></label>
                                            <input type="date" name="from_date" class="form-control" required/>
                                        </div>
                
                                        
                                        <div class="col">
                                            <label> <b> To Date: </b></label>
                                            <input type="date" name="to_date"  class="form-control" required/>
                                        </div>
                
                
                                    </div>
                                    
                                    <div class="row mt-2">
                
                                        <div class="col">
                
                                            <label> <b> Department: </b></label>
                                            
                                            {!! department_field(array( 'name'=>'department_id', 'class' => 'form-control standardSelect')) !!}
                
                                        </div> 
                
                
                                    </div>
                
                                    <div class="row mt-2">
                
                                        <div class="col">
                
                                            <label> <b> Notes: </b></label>
                                            
                                            <input type="text" class="form-control" name="note" />
                
                                        </div> 
                
                                        <div class="col">
                
                                            <label> <b> Payroll Type: </b></label>
                                            
                                            <select class="form-control standardSelect" name="payroll_type" required>
                                                <option value="Biweekly"> Biweekly </option>
                                                <option value="Monthly"> Monthly  </option>
                                            </select>
                
                                        </div> 
                
                
                                    </div>
                                
                
                        </div>
                    </div>
                </div>
                
 
            </div>

            <div class="modal-footer d-flex flex-row">
 
                <div class="p-2 ms-auto">   
                    <button type="submit" class="btn btn-success payroll-create-btn"> Create <i class="fa fa-plus"></i></button>
                 </div>

    
            </div>

        </form>

        </div>

    </div>
    
</div>
