jQuery(document).ready(function() { 

    jQuery("#emp_salary_form").on('submit', function(e){
  
        let token   = jQuery("input[name='_token']").val();
        
        let form    = jQuery(this);

        let  submitter = form.custom_submitter({
            token: token
        });

        //alert(submitter.isSuccess);
        
        console.log(submitter);


        //jQuery("#payroll-generate-list").ajax.reload();

        e.preventDefault();

        return false;
        
    });

    
});