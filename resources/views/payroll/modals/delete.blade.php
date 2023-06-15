
<!-- Del Payroll Modal -->

<div class="modal fade " id='deletePayrollModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="{{ route('payroll.delete') }}" method="POST" id="payroll-delete-form">
            
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
                            <strong class="card-title"> Delete Payroll </strong>
                        </div>
                        <div class="card-body">

                                                        
                            <div class="row">
            
                                <p class='text text-danger text-center'> Are you sure you want to delete this payroll? </p> 
        
                            </div>
                                

                        </div>
                    </div>
                </div>
                
 
            </div>



        <div class="modal-footer d-flex flex-row">

            <div class="p-2 ms-auto">   
                <button type="submit" class="btn btn-info"> Yes </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>            
            </div>

            <input type="hidden" class="del-payroll-id" name="payroll_id" />

        </div>
            
        </form>

        </div>

    </div>
  