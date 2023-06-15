
var countdownTimer;
var timestamp_in;
var employee_attendance_log;

jQuery(document).ready(function() { 
    

    // jQuery(".break2-btn").hide();
    // jQuery(".break1-btn").hide();

    // jQuery(".break2-btn").hide();

    // ;
    // jQuery(".lunch-btn").hide();
    // jQuery(".lunch-timer").hide();
    
    var current_week_list_tbl = jQuery("#current-week-sched-tbl").DataTable({
            
        searching: false, 
        paging: false, 
        info: false,
        ordering: false,

        ajax: {
            url: retrieve_current_week_schedule,
            dataSrc: '',
            data: function(d){ 
                
                //* assign filter parameters. 

                // var form = jQuery("#search_filter_form");
                // var data = getFormData(form);

                // d.search_params         = data;
                 
                // d.leads_list_type   = leads_list_type;
                
                // return d;

            },
            
        },
        columns: [
            { data: 'attendance_date' }, 
            { data: 'sched_time_in' },
            { data: 'sched_time_out' },
            { data: 'lunch_time' },
            { data: 'total_break_time' },
            { data: 'total_work_hours' }
        ],  

        createdRow: function (row, data, index) {

         //if the second column cell is blank apply special formatting
         
        if(jQuery("#current_attendance_id").val() ==  data['id']){
            jQuery(row).addClass('schedule_active');
        }

            console.log(data);
 
        },
        

        serverSide: false,
        processing: true,

        'language': {
            'loadingRecords': '&nbsp;',
            "processing": "<i class='fa fa-refresh fa-spin'></i>",
        }


    });





    jQuery("form.log-form").append("<input type='hidden' name='attendance_id' value="+jQuery("#attendance_id").val()+" />");

    // jQuery(".clock-in-btn").hide();


    jQuery("#punch-in-form").on('submit', function(e){
        

        jQuery(".clock-in").html(now_time());

        jQuery(this).hide();

        Swal.fire({
            title: 'Welcome!',
            html: 'The only way to get that success is to actually work and not just dream about it! Lets start the week with a bang! Onwards and upwards! <br> - Jerome Ochia',
            imageUrl: 'images/jerome.jpg',              
            imageWidth: 500,
            imageHeight: 500,
        });


        jQuery(".clock-out-btn").show();
        jQuery(".break1-btn").show();
        jQuery(".break2-btn").show();
        jQuery(".lunch-btn").show();
         
        //console.log(jQuery(this).serialize());
        console.log(jQuery(this).serialize());

        //  jQuery.post(attendance_punch_in_url, jQuery(this).serialize(), function(data, status){
        //     toastifyShow("Punch In at "+ now_time());
        // }); 
        
    });



    jQuery("#lunch-in-form").on('submit', function(e){

        jQuery(".lunch").html(now_time());
 
        jQuery(".punch-timer-container").show();
         
        jQuery(this).hide();
        
        jQuery(".back-btn").show();

        jQuery(".break1-btn").hide();
        jQuery(".break2-btn").hide();
        jQuery(".clock-out-btn").hide();

        jQuery(".back-break1-btn").hide();
        jQuery(".back-break2-btn").hide();

        jQuery('.punch-timer-label').html('Lunch: ');
        
        jQuery('#current_attendance_lunch_in').val(now_timestamp_raw());

        timestamp_in = jQuery("#current_attendance_lunch_in").val();

        countdownTimer = setInterval(punch_timer, 1000);

 
    });
 
    jQuery(".break1-btn").on('click', function(e){

        jQuery(this).hide();        

        jQuery(".break2-btn").hide();
        jQuery(".lunch-btn").hide();
        jQuery(".clock-out-btn").hide();

        jQuery(".back-break1-btn").show();
        
        jQuery('#current_attendance_break1').val(now_timestamp_raw());

        timestamp_in = jQuery("#current_attendance_break1").val();

        jQuery('.punch-timer-label').html('Break: ');

        jQuery(".break1").html(now_time());

        countdownTimer = setInterval(punch_timer, 1000);

        


    });


    jQuery(".back-break1-btn").on('click', function(e){

        jQuery(".break2-btn").show();
        jQuery(".lunch-btn").show();
        jQuery(".clock-out-btn").show();

        jQuery(".break1-back").html(now_time());        

        jQuery('#current_attendance_break1_back').val(now_timestamp_raw());

    });

    jQuery(".break2-btn").on('click', function(e){

        jQuery(this).hide();        

        jQuery(".lunch-btn").hide();
        jQuery(".clock-out-btn").hide();

        jQuery(".back-break2-btn").show();
        
        jQuery('#current_attendance_break2').val(now_timestamp_raw());

        timestamp_in = jQuery("#current_attendance_break2").val();


        jQuery('.punch-timer-label').html('Break: ');
        jQuery(".break2").html(now_time());

        countdownTimer = setInterval(punch_timer, 1000);


    });

    jQuery(".back-break2-btn").on('click', function(e){
 
        jQuery(".lunch-btn").show();
        jQuery(".clock-out-btn").show();

        jQuery(".break2-back").html(now_time());        

    
        jQuery('#current_attendance_break2_back').val(now_timestamp_raw());
    }); 
    
    jQuery(".back-lunch-btn").on('click', function(e){

        jQuery('#current_attendance_lunch_out').val(now_timestamp_raw());

        jQuery(".back-lunch").html(now_time());    

    }); 

    jQuery(".back-btn").on('click', function(e){

        //jQuery(".back").html(now_time());

        if(jQuery("#current_attendance_break2").val() == ''){
            jQuery(".break2-btn").show();

        }

        if(jQuery("#current_attendance_break1").val() == ''){
            jQuery(".break1-btn").show();

        }

        if(jQuery("#current_attendance_lunch_in").val() == ''){
            jQuery(".lunch-btn").show();

        }

        jQuery(".clock-out-btn").show();

        let punch_in_form = jQuery(this).serialize();
 
        jQuery(this).hide();
 
        clearTimeout(countdownTimer);
 
    });
     
    jQuery("#clockout-form").on('submit', function(e){
        
        jQuery(".clock-out").html(now_time());
        let punch_in_form = jQuery(this).serialize();
 
    
        Swal.fire(
            'Goodbye!',
            'Enjoy the rest of the day!',
            'success'
        );

        jQuery(".log-form").hide();

        jQuery('#current_attendance_time_out').val(now_timestamp_raw());

     });

    //* Generic Punch In for sending to server side

    jQuery(".log-form").on('submit', function(e){
        
        let punch_in_form = jQuery(this).serialize();

        current_week_list_tbl.ajax.reload();
        
        jQuery.post(attendance_punch_in_url, punch_in_form, function(data, status){
            console.log(data);
            toastifyShow(data.toastifyText + " at " + now_time());
        });

         e.preventDefault();
        return false;

    });


    // alert();

});