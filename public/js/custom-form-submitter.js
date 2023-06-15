
(function ( $ ) {

    var isSuccess;

    $.fn.custom_submitter = function( options ) {

        var settings = $.extend({
            // These are the defaults.
            successMessage: "Sucessfully Saved!",
            resetForm: true,
            isSuccess: true,

        }, options );

  
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': settings.token
            },
 
            url: $(this).attr('action'),
            data: $(this).serialize(),
            method : $(this).attr('method'),
            type: $(this).attr('method'),


            error: function(data){

                console.log(data);

            },

            success: function(data, status){

                console.log(settings);

                console.log(data);
                console.log(status);

                if(status == 'success'){

                    toastifyShow(data.message );
                    
                    ///console.log(settings);

                    if(settings.resetForm){


                        //this.reset();

                        console.log('reset form check');
                        isSuccess = true;
                        
                    }


                    // Clear Form

                    // $(':input',  "#save_add_user_form")
                    // .not(':button, :submit, :reset, :hidden')
                    // .val('')
                    // .removeAttr('checked')
                    // .removeAttr('selected');

                    //$(this)[0].reset();
 
                    
                }
 

            }


        });

        return isSuccess;

    }
 
}( jQuery ));


