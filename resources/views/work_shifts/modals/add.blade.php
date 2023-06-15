
<!-- Add New Work Shift -->

<div class="modal fade " id='addWorkShiftModal' tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form action="{{ route('work_shift.add') }}" method="POST">
            
            @csrf
 

            <!-- <div class="modal-header">
                <h4 class="modal-title text-center"> Add Work Shift </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> -->

            <div class="modal-body">

                <div class="row">
                        
                    <div class="col col-md-12 col-sm-12">

                        <!-- <h4> <b> Work Shift </b> </h4> -->
                        <div class="card">
                            
                            <div class="card-header">
                                <h4>Add New Work Shift</h4>
                            </div>

                            <div class="card-body">

                                <div class="mb-3 mt-4">
                                    <label for="work_shift_description_field" class="form-label"> Description </label>
                                    <input type="text" class="form-control" id="work_shift_description_field" name="description" value="">
                                </div>

                                <div class="row">

                                    <div class="mb-3 col col-6">
                                        <label for="time_in_field" class="form-label"> Time In </label>
                                        <input type="time" class="form-control" id="time_in_field" name="time_in" value="">
                                    </div>
                    
                                    <div class="mb-3 col col-6">
                                        <label for="time_out_field" class="form-label"> Time Out </label>
                                        <input type="time" class="form-control" id="time_outfield" name="time_out" value="">
                                    </div>

                                </div>


                                <div class="row form-group">

                                    <div class="col col-md-3"><label class=" form-control-label"> <b> Working Days </b> </label></div>

                                    <div class="col col-md-9">

                                        <div class="form-check">

                                            <div class="checkbox">
                                                <label for="monday" class="form-check-label ">
                                                    <input type="checkbox" id="" name="monday" checked value="1" class="form-check-input">Monday
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="tuesday" class="form-check-label ">
                                                    <input type="checkbox" id="" name="tuesday" checked value="1" class="form-check-input"> Tuesday
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="wednesday" class="form-check-label ">
                                                    <input type="checkbox" id="" name="wednesday" checked value="1" class="form-check-input"> Wednesday
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="thursday" class="form-check-label ">
                                                    <input type="checkbox" id="" name="thursday" checked value="1" class="form-check-input"> Thursday
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label for="friday" class="form-check-label ">
                                                    <input type="checkbox" id="" name="friday" checked value="1" class="form-check-input"> Friday
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="saturday" class="form-check-label ">
                                                    <input type="checkbox" id="" name="saturday" value="1" class="form-check-input"> Saturday
                                                </label>
                                            </div>

                                            
                                            <div class="checkbox">
                                                <label for="sunday" class="form-check-label ">
                                                    <input type="checkbox" id="checkbox3" name="sunday" value="1" class="form-check-input"> Sunday
                                                </label>
                                            </div>

                                        </div>

                                    </div>

                                </div>

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

