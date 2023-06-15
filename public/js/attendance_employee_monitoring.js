


jQuery(document).ready(function() {

    //jQuery("#save_attendance").ajax();
    var emp_monitoring_refreshRate = 1;


    var employee_list_tbl = jQuery("#employee-monitoring-table").DataTable({
        
        searching: false, 
        paging: false, 
        info: false,
        
        ajax: {
            url: retrieve_employee_monitoring,
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
            { data: 'employee_no' }, 
            { data: 'employee_name' },
            { data: 'time_in' },
            { data: 'break1' },
            { data: 'break2' },
            { data: 'lunch' },
            { data: 'time_out' },
            { data: 'last_attendance_log' }
        ],  
        
        createdRow: function (row, data, index) {
            //
            // if the second column cell is blank apply special formatting
            //
            jQuery(row).attr('id', data['lead_id']);
            
            //console.log(data['lead_id']);

        },


        serverSide: false,
        processing: false,

        'language': {
            'loadingRecords': '',
            "processing": "",
        },
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        // responsive: true

    });

    var employeeMonitoringInterval = setInterval( refreshEmployeeMonitoring, (1000 * emp_monitoring_refreshRate));

    jQuery("#refresh_rate_dropdown").on('change', function(){
        
        emp_monitoring_refreshRate = jQuery(this).val(); 
        
        clearInterval(employeeMonitoringInterval);

        employeeMonitoringInterval = setInterval(refreshEmployeeMonitoring, (1000 * emp_monitoring_refreshRate));

    });


    function refreshEmployeeMonitoring() {

 
        employee_list_tbl.ajax.reload(function(){

        });
        
    }

});