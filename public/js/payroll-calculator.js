    (function ($) {
        
    var basic_wage_rate;
    var hourly_rate;
    var allowance;
    var allowance_rate_per_day;
    var allowance_rate_per_payroll;
    var salary_id;
    var payroll_info;
    
    jQuery("#payroll-generate-list").DataTable({

        searching: false, 
        paging: false, 
        info: false,
        serverSide: false,
        processing: false,
        ordering: false,

        // ajax: {
        //     "url": emp_salary_retrieve_url,
        //     "type": "POST"
        //   }
        
 
    });


    jQuery('input[name="nd_hours[]"]').change(function(){

    });

    var nd_hours = jQuery('.nd_hours_field');

    jQuery.each(nd_hours , function(index, item) {
        
        jQuery(item).on("change", function() {

            let basic_wage = parseMoneyAmount(jQuery(".basic_wage:eq("+index+")").val());

            let hourly_rate_amount = jQuery(".hourly_rate:eq("+index+")").val();

            let hourly_rate =  parseMoneyAmount(hourly_rate_amount);
            
            let nd_hours    = jQuery(this).val();

            let nd_diff_amount = nd_hours_amount_calc(nd_hours, hourly_rate);

            jQuery(".nd_differential_amount:eq("+index+")").val(nd_diff_amount);
            
        });
        
    });

    var gross_pay_field = jQuery('.gross_pay_field');
    
    jQuery.each(gross_pay_field , function(index, item) {


        jQuery(item).on("change", function() {

        });

    });

    jQuery(".employee_salary_edit").on('click', function(event){

        salary_id = jQuery(this).attr('data-salaryid');

        jQuery('#edit_salary_id').val(salary_id);

    });

    
    jQuery("#salaryComputationEditModal").on('show.bs.modal', function(event){

        jQuery.get( salary_retrieve_url, { salary_id: salary_id },  function( data ) {
        
            console.log(data);

            let salary_info             = data.salary_info;
            let employee_info           = data.employee_info;
                
            basic_wage_rate             = employee_info.basic_wage;
            hourly_rate                 = basic_wage_rate / 160;
            allowance                   = employee_info.allowance;
            allowance_rate_per_day      = allowance / 20;
            allowance_rate_per_payroll  = allowance / 2;

            // basic_wage_rate.toFixed(2)

            jQuery("#edit_basic_wage").val(money_formatter(basic_wage_rate));

            jQuery("input[name='basic_wage']").val(basic_wage_rate);

            jQuery("#edit_hourly_rate").val(money_formatter(hourly_rate));
            jQuery("#edit_allowance").val(money_formatter(allowance));
            jQuery("#edit_allowance_rate_per_day").val(money_formatter(allowance_rate_per_day));
            jQuery("#edit_allowance_per_payroll").val(money_formatter(allowance_rate_per_payroll));

            jQuery("input[name='allowance']").val(allowance_rate_per_payroll);

            jQuery("input[name='total_basic_wage_amount']").val();

            jQuery("span.employee_salary_name").html(employee_info.first_name + ' ' + employee_info.last_name);
            

            // Salary Info 
            let total_reg_hours_worked = (salary_info.total_regular_hours_worked) ?? 0;
            let total_nd_hours = (salary_info.nd_hours) ?? 0;
            total_hours_worked = (salary_info.total_hours_worked) ?? 0;


            jQuery("#edit_total_regular_hours_worked").val(total_reg_hours_worked);
            jQuery("#edit_nd_hours").val(total_nd_hours);
            
            //jQuery("#edit_total_hours_worked").val(total_hours_worked);


            // Earnings 

            jQuery("#edit_total_regular_work_hours_amount").val(money_formatter(salary_info.total_basic_wage_amount));
            jQuery("#edit_total_nd_amount").val(money_formatter(salary_info.total_nd_amount));
            jQuery("input[name='sales_commission_amount']").val((salary_info.sales_commission_amount));
            jQuery("input[name='special_bonus_amount']").val((salary_info.special_bonus_amount));
            jQuery("input[name='backpay_amount']").val((salary_info.backpay_amount));
            jQuery("input[name='backpay_notes']").val(salary_info.backpay_notes);
            

            
            // Deductibles 

            jQuery("#edit_absent_hours_cnt").val(salary_info.absents);

            let late_hours = salary_info.late_minutes / 60;
            let late_mins  = salary_info.late_minutes % 60;

            jQuery("#edit_late_hours").val(late_hours);
            jQuery("#edit_late_mins").val(late_mins);


            let undertime_hours = salary_info.undertime_minutes / 60;
            let undertime_mins  = salary_info.undertime_minutes  % 60;

            jQuery("#edit_undertime_hours").val(undertime_hours);
            jQuery("#edit_undertime_mins").val(undertime_mins);

            // Deduction Amounts
            jQuery("#absent_amount_hours").val(money_formatter(salary_info.total_absent_amount));
            jQuery("#late_amount_hours").val(money_formatter(salary_info.total_late_amount));
            jQuery("#undertime_amount_hours").val(money_formatter(salary_info.total_undertime_amount));

            

            // Overtime & Holidays

            jQuery("#edit_regular_ot_hours").val(salary_info.total_regular_ot_hours);
            jQuery("#edit_restday_ot_hours").val(salary_info.restday_ot);
            jQuery("#edit_special_holiday_hours").val(salary_info.special_holiday_hours);
            jQuery("#edit_legal_holiday_hours").val(salary_info.legal_holiday_hours);
            jQuery("#edit_legal_holiday_ns_hours").val(salary_info.legal_holiday_ns_hours);

            // Overtime & Holidays Amount

            jQuery("#edit_regular_ot_amount").val(money_formatter(salary_info.regular_ot_total_amount));
            jQuery("#edit_restday_ot_amount").val(money_formatter(salary_info.restday_ot_total_amount));
            jQuery("#edit_special_holiday_amount").val(money_formatter(salary_info.special_holiday_amount));
            jQuery("#edit_legal_holiday_amount").val(money_formatter(salary_info.legal_holiday_amount));
            jQuery("#edit_legal_holiday_ns_amount").val(money_formatter(salary_info.legal_holiday_ns_amount));


            // Government Contributions

            jQuery("#sss_deduction_amount").val( (salary_info.sss_amount));
            jQuery("#philhealth_deduction_amount").val((salary_info.philhealth_amount));
            jQuery("#pagibig_deduction_amount").val((salary_info.pagibig_amount));

            // Totals
            
            jQuery("#edit_total_earnings").val(money_formatter(salary_info.gross_pay_amount));
            jQuery("#edit_total_deductions").val(money_formatter(salary_info.total_deduction_amount));
            jQuery("#edit_net_pay").val(money_formatter(salary_info.netpay_amount));

        });
          
        
    
    });

    jQuery("#edit_total_regular_hours_worked, #edit_nd_hours").on('change', function(){

        let total_regular_hours_worked  = (jQuery("#edit_total_regular_hours_worked").val()) ? jQuery("#edit_total_regular_hours_worked").val() : 0;
        let total_nd_hours              = (jQuery("#edit_nd_hours").val()) ? jQuery("#edit_nd_hours").val() : 0;  
 
        let total_hours_worked          = parseFloat(total_regular_hours_worked) + parseFloat(total_nd_hours);
        

        jQuery("#edit_total_hours_worked").val(total_hours_worked);


    });

    jQuery(".calculate-salary").on('click', function(){

        jQuery("#loader-spinner").show();

        let total_regular_hours_worked  = jQuery("#edit_total_regular_hours_worked").val();
        let total_nd_hours      = jQuery("#edit_nd_hours").val();
        let total_regular_basic_amount =  parseFloat(hourly_rate * total_regular_hours_worked)  + parseFloat(hourly_rate * total_nd_hours);
        total_earnings = 0;

        total_hours_worked  = 0;
        total_hours_worked  +=   parseFloat(total_regular_hours_worked) + parseFloat(total_nd_hours);

        jQuery("#edit_total_hours_worked").val(total_hours_worked);
  
        allowance_rate_per_payroll = parseFloat(allowance_rate_per_payroll);

        total_earnings += allowance_rate_per_payroll;



        // Total Regular Work Hours Computation 


        jQuery("#edit_total_regular_work_hours_amount").val(money_formatter(total_regular_basic_amount));

        jQuery("input[name='total_basic_wage_amount']").val(total_regular_basic_amount);

        total_earnings += total_regular_basic_amount;

        // Night Diff Computation

        let total_nd_amount = parseFloat(nd_hours_amount_calc(total_nd_hours, hourly_rate)) ;
        
        total_earnings += total_nd_amount;

        jQuery("#edit_total_nd_amount").val(money_formatter(total_nd_amount));

        jQuery("input[name='total_nd_amount']").val(total_nd_amount);

        // Sales Commission

        let sales_commission = jQuery("#edit_sales_commission_amount").val() || 0;

        total_earnings += parseFloat(sales_commission);


        // Special Bonus Amount

        let special_bonus_amount = jQuery("#edit_special_bonus_amount").val() ||  0;

        total_earnings += parseFloat(special_bonus_amount);

        
        // Special Backpay Amount

        let backpay_amount = jQuery("#edit_backpay_amount").val() || 0;

        total_earnings += parseFloat(backpay_amount);

        //* Overtime and Holidays

            // Regular OT Hours
            
            regular_ot_hours            = jQuery("#edit_regular_ot_hours").val() || 0;
            regular_ot_rate             = .25;
            
            let regular_ot_amount = premium_hours_amount_calc(regular_ot_hours, hourly_rate, regular_ot_rate);
            total_earnings += regular_ot_amount;

            jQuery("#edit_regular_ot_amount").val(money_formatter(regular_ot_amount));
            
            jQuery("input[name='regular_ot_total_amount']").val(regular_ot_amount);

            // Rest Day OT Hours

            restday_ot_hours        = jQuery("#edit_restday_ot_hours").val() || 0;
            restday_ot_rate         = 1.69;

            let restday_ot_amount = premium_hours_amount_calc(restday_ot_hours, hourly_rate, restday_ot_rate);
            total_earnings += restday_ot_amount;

             jQuery("#edit_restday_ot_amount").val(money_formatter(restday_ot_amount));

             jQuery("input[name='restday_ot_total_amount']").val(restday_ot_amount);

            // Special Holiday Hours

            special_holiday_hours        = jQuery("#edit_special_holiday_hours").val() || 0;
            special_holiday_rate         = .30;

            let special_holiday_amount = premium_hours_amount_calc(special_holiday_hours, hourly_rate, special_holiday_rate);
            total_earnings += special_holiday_amount;

            jQuery("input[name='special_holiday_amount']").val(special_holiday_amount);
            jQuery("#edit_special_holiday_amount").val(money_formatter(special_holiday_amount));

            // Legal Holiday Hours

            legal_holiday_hours        = jQuery("#edit_legal_holiday_hours").val() || 0;
            legal_holiday_rate         = 1.0;


            let legal_holiday_amount = premium_hours_amount_calc(legal_holiday_hours, hourly_rate, legal_holiday_rate);
            total_earnings += legal_holiday_amount;

            jQuery("input[name='legal_holiday_amount']").val(legal_holiday_amount);
            jQuery("#edit_legal_holiday_amount").val(money_formatter(legal_holiday_amount));


            // Legal Holiday Night Diff Hours

            legal_holiday_ns_hours        = jQuery("#edit_legal_holiday_ns_hours").val() || 0;
            legal_holiday_ns_rate         = 1.3;

            let legal_holiday_ns_amount = premium_hours_amount_calc(legal_holiday_ns_hours, hourly_rate, legal_holiday_ns_rate);
            total_earnings += legal_holiday_ns_amount;

            jQuery("input[name='legal_holiday_ns_amount']").val(legal_holiday_ns_amount);
            jQuery("#edit_legal_holiday_ns_amount").val(money_formatter(legal_holiday_ns_amount));


            


        special_holiday_hours   = jQuery("#edit_special_holiday_hours").val();

        legal_holiday_hours     = jQuery("#edit_legal_holiday_hours").val();


        // Total Earnings Computation

        jQuery("input[name='gross_pay_amount']").val(total_earnings);

        jQuery("#edit_total_earnings").val(money_formatter(total_earnings));


        // Deductions

        let total_deductions = 0;

            let minute_rate = hourly_rate / 60;

            // Absent
    
            let total_absent_cnt = jQuery("#edit_absent_hours_cnt").val() || 0;
 
            absent_amount_deduction = total_absent_cnt * (8 * hourly_rate);

            jQuery("input[name='total_absent_amount']").val(absent_amount_deduction);

            jQuery("#absent_amount_hours").val(money_formatter(absent_amount_deduction));

            // Lates
    
            let late_hours = jQuery("#edit_late_hours").val() || 0;
            let late_mins  = jQuery("#edit_late_mins").val() || 0;

            total_late_in_minutes   = parseFloat(late_hours * 60 ) + parseFloat(late_mins);
            late_amount_deduction   = total_late_in_minutes * minute_rate;


            jQuery("input[name='total_late_amount']").val(late_amount_deduction);
            jQuery("#late_amount_hours").val(money_formatter(late_amount_deduction));
            jQuery("#edit_total_late_minutes").val(total_late_in_minutes);

            // Undertime

            let undertime_hours = jQuery("#edit_undertime_hours").val() || 0;
            let undertime_mins  = jQuery("#edit_undertime_mins").val() || 0;

            total_undertime_in_minutes  = parseFloat((undertime_hours * 60 )) + parseFloat(undertime_mins);
            undertime_amount_deduction  = total_undertime_in_minutes * minute_rate;

            jQuery("input[name='total_undertime_amount']").val(undertime_amount_deduction);
            jQuery("#undertime_amount_hours").val(money_formatter(undertime_amount_deduction));
            jQuery("#edit_total_undertime_minutes").val(total_undertime_in_minutes);

            total_deductions += parseFloat(absent_amount_deduction) + parseFloat(late_amount_deduction) + parseFloat(undertime_amount_deduction);

        // Government Contributions

            sss_deduction_amount        = parseFloat(jQuery("#sss_deduction_amount").val()) || 0;
            philhealth_deduction_amount = parseFloat(jQuery("#philhealth_deduction_amount").val()) || 0;
            pagibig_deduction_amount    = parseFloat(jQuery("#pagibig_deduction_amount").val()) || 0;

            total_deductions     += sss_deduction_amount + philhealth_deduction_amount + pagibig_deduction_amount;



        jQuery("#edit_total_deductions").val(money_formatter(total_deductions));

        jQuery("input[name='total_deduction_amount']").val(total_deductions);

        // Total Net Pay Computations

        let net_pay = total_earnings - total_deductions;

        jQuery("#edit_net_pay").val(money_formatter(net_pay));

        jQuery("input[name='netpay_amount']").val(net_pay);

        jQuery("#loader-spinner").delay(300).fadeOut();


});


})(jQuery);