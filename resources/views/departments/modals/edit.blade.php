
<!-- Edit New Departments -->

<div class="modal fade " id='editDepartmentsModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="{{ route('departments.add') }}" method="POST" id="save_departments_form">
            
            @csrf

            <div class="modal-body">

                <div class="row">
                        
                    <div class="col col-md-12 col-sm-12">

                        <div class="card">
                            
                            <div class="card-header">
                                <h4>Add New Departments</h4>
                            </div>

                        <div class="card-body">

                            <div class="mb-3 mt-4">
                                <label for="department_name_field" class="form-label"> Department Name </label>
                                <input type="text" class="form-control" id="department_name_field" name="department_name" value="">
                            </div>

                            <div class="mb-3">
                                <label for="department_description_field" class="form-label"> Description </label>
                                <input type="text" class="form-control" id="department_description_field" name="department_desc" value="">
                            </div>
            
                            <div class="mb-3">
                                <label for="department_field" class="form-label">  Parent Department </label>

                                {!! department_field(array( 'name'=>'parent_department_id', 'class' => 'form-control standardSelect')) !!}
 
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

  