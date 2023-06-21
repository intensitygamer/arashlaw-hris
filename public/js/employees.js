(function ($) {
     
    jQuery('#employees-list').DataTable({
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });

    jQuery("select[name='work_shift']").change(function(){

        if(jQuery(this).val() == "custom_shift"){
            jQuery(".custom_shift_field_group").show();
        }else{
            jQuery(".custom_shift_field_group").hide();

        }

    });


    jQuery("#save_employee_form").on('submit', function(e){

        let token = jQuery("input[name='_token']").val();
 
        jQuery(this).custom_submitter({
            token: token
       });

        $("#employees-list").DataTable().ajax.reload();
        e.preventDefault();

        return false;

    });
    
    //jQuery(".add-user-btn").on('c', function(e){
        
    jQuery("#addUserModal").on('show.bs.modal', function(e){
 
        let button = e.relatedTarget
        // Extract info from data-bs-* attributes
        let empId = button.getAttribute('data-bs-empId');

        jQuery("#user_add_employee_id").val(empId);
      
    });

    jQuery("#editEmployeesModal").on('show.bs.modal', function(e){

        let button = e.relatedTarget

        let empId = button.getAttribute('data-bs-empId');



        jQuery.get( employee_info_retrieve_url, { emp_id: emp_id },  function( data ) {

            console.log(data);
            alert(data);
            
        });


       // alert(empId);

    });
    

    jQuery("#save_add_user_form").on('submit', function(e){

        let token = jQuery("input[name='_token']").val();
        
        let form = jQuery(this);

        let  submitter = form.custom_submitter({
            token: token
        });

        alert(submitter.isSuccess);
        
        console.log(submitter);

        jQuery("#addUserModal").modal('hide');
        
        e.preventDefault();

        return false;

    });
 

})(jQuery);
