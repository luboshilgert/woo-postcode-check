jQuery(function () {
    jQuery("#lh_postcode_check").submit(function (e) {
        e.preventDefault();
        jQuery("#lh_postcode_check_result_ok").hide();
        jQuery("#lh_postcode_check_result_err").hide();
        jQuery("#lh_postcode_check_result_other").hide();
        jQuery("#lh_postcode_check_result_format").hide();
        jQuery("#lh_postcode_check_result_ok_price").hide(); 
        jQuery("#lh_postcode_check_result_processing").show();
        jQuery.post(check_postcode_ajax.ajax_url,
                {
                    action: 'postcode_check',
                    lh_postcode: jQuery("#lh_postcode_input").val()
                },
                function (data, status) {
                   // alert("Data: " + data + "\nStatus: " + status);
                   jQuery("#lh_postcode_check_result_processing").hide();
                   if(data == 0){
                     jQuery("#lh_postcode_check_result_ok").fadeIn();  
                   }else if(data > 0){
                       jQuery("#lh_postcode_costs").html(data);
                       jQuery("#lh_postcode_check_result_ok_price").fadeIn(); 
                   }else if(data == 'err'){
                       jQuery("#lh_postcode_check_result_err").fadeIn(); 
                   }else if(data == 'format'){
                       jQuery("#lh_postcode_check_result_format").fadeIn();  
                   }else{
                      jQuery("#lh_postcode_check_result_other").fadeIn();  
                   }
                         
                  // jQuery("#lh_postcode_check_result").html(data);
                });
    });
});