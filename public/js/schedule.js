jQuery(document).ready(function() {
 
    //jQuery("#save_attendance").ajax();

    jQuery("#save_attendance_form").on('submit', function(e){

        let token = jQuery("input[name='_token']").val();
 
        jQuery(this).custom_submitter({
            token: token
        });

        e.preventDefault();

        return false;

    });


});