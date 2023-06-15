(function ($) {

    jQuery('#payroll-headers').DataTable({
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });
     
    // jQuery(".amount_rate_field_group").;
    
    jQuery("div.amount_rate_field_group").hide();

    jQuery("select[name='amount_type']").change(function(){
        
        if(jQuery(this).val() == 'rate')
            jQuery("div.amount_rate_field_group").show();
        else 
            jQuery("div.amount_rate_field_group").hide();

    });
    

})(jQuery);
