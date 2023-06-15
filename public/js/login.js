jQuery(function () {
         
    jQuery("#login-form").on('submit', function(e){

        let token = jQuery("input[name='_token']").val();
        
        let form = jQuery(this);

        let submit_result = form.custom_submitter({
             token: token
        });
  
        console.log(form.isSuccess);
        console.log(form);
        // console.log(submit_result.settings);
         
        if(submit_result.isSuccess){
                
            Swal.fire(
                'Welcome to the Legends!',
                'Enjoy the rest of the day!',
                'success'
            );
            

        }else{

           //toastifyShow("Invalid Login", 'error');

        }
 
        e.preventDefault();

        return false;

    });
 

});