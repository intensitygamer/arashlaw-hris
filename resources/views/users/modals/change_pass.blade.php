
<!-- Change User  -->

<div class="modal fade " id='changePassModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

    <form action = "{{ route('users.add') }}" method="POST" id="save_add_user_form">

      <div class="modal-content">
             @csrf
 
             <div class="modal-header ">
                <h4 class="modal-title text-center">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">

                        <div class="col col-md-12 col-sm-12">
                           
                            <div class="card">

                                <div class="card-header">

                                    <h4> <b> Change Password </b> </h4>
                                    
                                </div>

                                <div class="card-body">

                                    <div class="mb-3">
                                        <label for="username_field" class="form-label"> User </label>
                                        <input type="text" class="form-control" id="username_field" name="username" value="">
                                    </div>
                    
                                    <div class="mb-3">

                                        <label for="passwordField" class="form-label"  > Password </label>

                                        <div class="input-group w-30">

                                            <input type="password" class="form-control password_fields " name="password"  required>
                                        
                                            <span class="input-group-text">                               
                                                <a href="#" class="togglePassword">
                                                <i class="fa fa-eye"></i>
                                                </a>
                                            </span>

                                        </div>
                                    
                                    </div>
                    
                    
                                </div>

                            </div>

                        </div>

            <div class="modal-footer d-flex flex-row">
 
                 <div class="p-2 ms-auto">   
                    <button type="submit" class="btn btn-success user-save-btn"> <i class="fa fa-save"></i> Save </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                 </div>

            </div>

            </div>

            <input type="hidden" id="user_add_employee_id" name="employee_id" value="" />


      </div>

    </form>

    
    </div>

  </div>

  