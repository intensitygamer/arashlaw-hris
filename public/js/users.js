jQuery(document).ready(function() {

    jQuery('#users-list').DataTable({
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });
 
    jQuery("#addUserModal").on('show.bs.modal', function(e){
 
        const button = e.relatedTarget
        // Extract info from data-bs-* attributes
        const empId = button.getAttribute('data-bs-empId');

        jQuery("#user_add_employee_id").val(empId);
      
    });
    
    jQuery("#save_add_user_form").on('submit', function(e){

        let token = jQuery("input[name='_token']").val();
        
        let form = jQuery(this);

        form.custom_submitter({
             token: token
        });

        jQuery("#addUserModal").modal('hide');
        
        e.preventDefault();

        return false;

    });
 

});