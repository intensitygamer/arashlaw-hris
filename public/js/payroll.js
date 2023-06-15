(function ($) {
     
    jQuery('#employees-list').DataTable({
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });
    
    jQuery('#department-dropdown').select2();


    jQuery(".nd_hours_field").change(function(){
        
        jQuery(".nd_differential_amount").val(0);

    });

    jQuery(".employee_salary_attendance").on('click', function(){
        
        jQuery("#attendanceEmployeeViewModal").modal('show'); 

        //* Load Attendance

    });
 
    jQuery(".payroll-delete-btn").on('click', function(){
        
        let payroll_id = jQuery(this).attr('value');

        jQuery(".del-payroll-id").val(payroll_id);


    });

    jQuery(".payroll-edit-btn").on('click', function(){
        
 
        let payroll_id = jQuery(this).attr('value');

        jQuery(".edit-payroll-id").val(payroll_id);
    });


    jQuery("#payroll-delete-form").on('submit', function(e){

        let token = jQuery("input[name='_token']").val();
        
        let form = jQuery(this);

        let  submitter = form.custom_submitter({
            token: token
        });

        alert(submitter.isSuccess);
        
        console.log(submitter);

         
        e.preventDefault();

        return false;

    });

    jQuery("#payroll_publish_form").on('submit', function(e){
        
        let token = jQuery("#payroll_publish_form input[name='_token']").val();
         
        let form = jQuery(this);

        let  submitter = form.custom_submitter({
            token: token
        });

        // alert(submitter.isSuccess);
        
        // console.log(submitter);

        // alert(1);

        
        e.preventDefault();

        return false;

    });

})(jQuery);
