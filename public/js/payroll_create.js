 

jQuery(function () {
      
    // jQuery(".nd_hours_field").change(function(){


    jQuery('.employee_salary_edit').on('click', function(){

        jQuery("#salaryComputationEditModal").modal('show');

    });

    jQuery("#save-payroll-btn").on('click', function(e){      

        toastifyShow("Saving Payroll");

    });

    jQuery("#generate-payroll-form").on('submit', function(e){      

        toastifyShow("Publishing Payroll");

        jQuery('.loader-spinner').show();

        e.preventDefault();

        return false;

      });
 
    jQuery("#payroll-create-submit").on('submit', function(e){

        jQuery(this).attr('disabled', false);

 
        // e.preventDefault();

        // return false;

    });

});
