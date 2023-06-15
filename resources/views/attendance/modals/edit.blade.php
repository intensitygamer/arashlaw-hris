
<!-- Edit Employee Attendance -->

<div class="modal fade " id='editEmployeeAttendanceInfo' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

            <form action="" method="POST">
                
                @csrf
                
            <!-- 
                <div class="modal-header">
                    <h4 class="modal-title text-center">Add New Job Position</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div> -->

                <div class="modal-body">

                    <div class="row">
                            
                        <div class="col col-md-12 col-sm-12">
    
                            <div class="card">
                                
                                <div class="card-header">
                                    <h4>Edit Employee Attendance Info</h4>
                                </div>

                            <div class="card-body">

 
                                <div class="col col-md-6 col-sm-12">
        
                                    <div class="mb-3">
                                        <label for="attendance_date_field" class="form-label"> Attendance Date </label>
                                        <input type="time" class="form-control" id="attendance_date_field" name="attendance_date" value="">
                                    </div>
                    
                                    <div class="mb-3 mt-4">
                                        <label for="time_in_field" class="form-label"> Scheduled Time In </label>
                                        <input type="datetime-local" class="form-control" id="time_in_field" name="time_in" value="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="time_out_field" class="form-label"> Scheduled Time Out </label>
                                        <input type="datetime-local" class="form-control" id="time_out_field" name="time_out" value="">
                                    </div>

                                    <div class="mb-3 mt-4">
                                        <label for="time_in_field" class="form-label"> Time In </label>
                                        <input type="datetime-local" class="form-control" id="time_in_field" name="time_in" value="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="time_out_field" class="form-label"> Time Out </label>
                                        <input type="datetime-local" class="form-control" id="time_out_field" name="time_out" value="">
                                    </div>
                
                                </div>

                                <div class="col col-md-6 col-sm-12">

                                    <div class="mb-3">
                                        <label for="time_out_field" class="form-label"> Lunch In  </label>
                                        <input type="time" class="form-control" id="time_out_field" name="time_out" value="">
                                    </div>
                    

                                    <div class="mb-3">
                                        <label for="time_out_field" class="form-label"> Lunch Back </label>
                                        <input type="time" class="form-control" id="time_out_field" name="time_out" value="">
                                    </div>
                    
                                    
                                    <div class="mb-3">
                                        <label for="break1_field" class="form-label"> Break 1 </label>
                                        <input type="time" class="form-control" id="break1_field" name="break1" value="">
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="break1_back_field" class="form-label"> Break 1 Back </label>
                                        <input type="time" class="form-control" id="break1_back_field" name="break1_back" value="">
                                    </div>
                    
                                    
                                    <div class="mb-3">
                                        <label for="break2_field" class="form-label"> Break 2 </label>
                                        <input type="time" class="form-control" id="break2_field" name="break2" value="">
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="break2_back_field" class="form-label"> Break 2 Back </label>
                                        <input type="time" class="form-control" id="break2_back_field" name="break2_back" value="">
                                    </div>
                    
                                </div> 

                                <div class="col col-md-12 col-sm-12">

                                    <div class="mb-3 input-group">
                                        <span class="input-group-text">Notes: </span>
                                        <textarea class="form-control" aria-label="notes" style="resize: none"></textarea>
                                    </div>

                                </div> 


                            </div>

                        </div>

                    </div>
 
            </form>

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

