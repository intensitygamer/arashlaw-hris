
<!-- Update Profile Modal -->

<div class="modal fade " id='editUserProfileModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

    <form action = "{{ route('users.profile.update') }}" method="POST" id="save_add_user_form">

      <div class="modal-content">
             @csrf
 

            <div class="modal-body">

                <div class="row">

                        <div class="col col-md-12 col-sm-12">
                           
                            <div class="card">

                                <div class="card-header">

                                    <h4> <b> Update Profile </b> </h4>
                                    
                                </div>

                                <div class="card-body">

                                    <div class="mb-3">
                                        <label for="username_field" class="form-label"> Username </label>
                                        <input type="text" class="form-control" id="username_field" name="username" value="{{ session()->get('username') }}">
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="user_profile_field" class="form-label"> Profile Picture </label>
                                        <input type="file" class="form-control" id="user_profile_field" name="user_profile_image" value="">
                                    </div>
                    
                    
                                    <div class="mb-3">
                                        <label for="email_field" class="form-label"> Email </label>
                                        <input type="text" class="form-control" id="email_field" name="email" value="">
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

  