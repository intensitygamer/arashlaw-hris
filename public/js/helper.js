if (typeof obj !== 'parseMoneyAmount') { 

    function parseMoneyAmount(val){

        return parseFloat(val.replaceAll(',', ''));

    }

}

if (typeof obj !== 'toastifyShow') { 

    function toastifyShow(text, type){
        
        let background_color = "#28a745"; 
        
        if(type == 'error'){
            background_color = "#dc3545";

        }

        Toastify({
            text: text + " ",
            duration: 3000,
            gravity: "bottom", 
            position: "right", 
            stopOnFocus: true,
            style: {
            background: background_color,
            },
            offset: {
                x: 25,
                y: 25 
            },
            
            onClick: function(){

            } 

        }).showToast();


    }

}

if (typeof obj !== 'now_date') { 

    function now_date(){
        return dayjs().format('YYYY-MM-DD');
    }

}

if (typeof obj !== 'now_time') { 

    function now_time(){
        return dayjs().format('hh:mm A');
    }

}
 
if (typeof obj !== 'now_timestamp_raw') { 
    
    function now_timestamp_raw(){
        return dayjs().format('YYYY-MM-DD HH:mm:ss');
    }
    
 }

 if (typeof obj !== 'money_formatter') { 
    
    function money_formatter(amount){
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
    }
    
 
}


 function punch_timer() {

    const d = new Date();
    
    //document.getElementsByClassName("punch-timer").innerHTML = countdown;
       
      let this_time = dayjs();

      let countdown_secs = this_time.diff(timestamp_in, 'second');
      
      const formatted = dayjs.utc(countdown_secs * 1000).format('HH:mm:ss');

      jQuery("span.punch-timer").html(formatted);
      
      //alert(this_time);

  }

  function nd_hours_amount_calc(nd_hours, hourly_rate) {

    let nd_diff_amount = hourly_rate * .1 * nd_hours;
            
    nd_diff_amount =  Math.round((nd_diff_amount * 100) / 100).toFixed(2);

    return nd_diff_amount;

  }  

  function premium_hours_amount_calc(hours, hourly_rate, rate) {

    let nd_diff_amount = hourly_rate * rate * hours;
            
    total_amount =  Math.round((nd_diff_amount * 100) / 100).toFixed(2);

    return parseFloat(total_amount);

  }