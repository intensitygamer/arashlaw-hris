
<!-- Add New Departments -->

<div class="modal fade " id='addDepartmentsModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="" method="POST">
            
            @csrf
 
        <!-- 
            <div class="modal-header">
                <h4 class="modal-title text-center">Add New Department</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> -->

            <div class="modal-body">

                <div class="row">
                        
                    <div class="col col-md-12 col-sm-12">

                        <div class="card">
                            
                            <div class="card-header">
                                <h4>Add New Work Shift</h4>
                            </div>

                        <div class="card-body">

                            <div class="mb-3 mt-4">
                                <label for="job_title_field" class="form-label"> Department Name </label>
                                <input type="text" class="form-control" id="job_title_field" name="job_title" value="">
                            </div>

                            <div class="mb-3">
                                <label for="job_description_field" class="form-label"> Description </label>
                                <input type="text" class="form-control" id="job_description_field" name="job_description" value="">
                            </div>
            
                            <div class="mb-3">
                                <label for="department_field" class="form-label">  Parent Department </label>

                                {!! department_field(array( 'name'=>'department_id', 'class' => 'form-control standardSelect')) !!}
 
                            </div>

                        </div>

                    </div>
                    
                </div>
 


            </div>
    

            <div class="modal-footer d-flex flex-row">
 
                 <div class="p-2 ms-auto">   
                    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                 </div>
                 

            </div>

        </form>

      </div>

    </div>

  </div>

  