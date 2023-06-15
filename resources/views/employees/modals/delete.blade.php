
<!-- Delete Employee -->

<div class="modal fade " id='terminateEmployeesModal' tabindex="-1">

    <div class="modal-dialog modal-xs modal-dialog-centered">

      <div class="modal-content ">

        <form action="{{ route('employees.terminate') }}" method="POST">
            
            @csrf
 
            <div class="modal-header text-center">
                <h2 class="modal-title  w-100"> Terminate Employee</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <p class='text text-center'> Are you sure you want to terminate this employee? </p> 
            </div>

            <div class="modal-footer d-flex flex-row">
 
                <div class="p-2 ms-auto">   
                    <button type="submit" class="btn btn-danger"> Yes </button>
                 </div>

    
            </div>

            <input type="hidden" name="employee_id" value="" />
        
        </form>

        </div>

    </div>
 
  </div>
