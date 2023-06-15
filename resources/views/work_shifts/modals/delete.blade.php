
<!-- Delete Employee -->

<div class="modal fade " id='delWorkShiftModal' tabindex="-1">

    <div class="modal-dialog modal-xs">

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
