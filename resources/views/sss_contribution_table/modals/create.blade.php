
<!-- Create SSS Contribution Modal -->

<div class="modal fade " id='addSSSContributionModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="" method="POST" id="">
            
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
                            <strong class="card-title"> Add SSS Bracket </strong>
                        </div>                               

                        <div class="card-body">
                        
                                    @csrf 
                                    

                                        <div class="mb-3 mt-4">
                                            <label for="range_from_field" class="form-label"> Range From </label>
                                            <input type="text" class="form-control" id="range_from_field" name="range_from" value="">
                                        </div>
 
                                        <div class="mb-3 mt-4">
                                            <label for="range_from_field" class="form-label"> Range To </label>
                                            <input type="text" class="form-control" id="range_from_field" name="range_from" value="">
                                        </div>
 
                                        <div class="mb-3 mt-4">
                                            <label class="form-label"> <b> Salary Credit: </b></label>
                                            <input type="text" name="salary_credit"  class="form-control" required/>
                                        </div>
                
                                        <div class="mb-3 mt-4">
                                            <label class="form-label"> <b> Employee Share: </b></label>
                                            <input type="text" name="employee_share"  class="form-control" required/>
                                        </div>
                

                                        <div class="mb-3 mt-4">
                                            <label class="form-label"> <b> Employeer Share: </b></label>
                                            <input type="text" name="employeer_share"  class="form-control" required/>
                                        </div>

                                        
                                        <div class="mb-3 mt-4">
                                            <label class="form-label"> <b> Total Contribution Amount: </b></label>
                                            <input type="text" name="total_contribution_amount"  class="form-control" required/>
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
