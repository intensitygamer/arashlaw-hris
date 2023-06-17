jQuery(document).ready(function() {

    //jQuery("#save_attendance").ajax();

    jQuery("#save_job_position_form").on('submit', function(e){

        let token = jQuery("input[name='_token']").val();
        
        jQuery(this).custom_submitter({
             token: token,
             resetForm: false
        });

        e.preventDefault();

        return false;

    });


});