/*-------------register logic--------------*/

jQuery("#frm-reg").on('submit',function(e){
    jQuery('#email_err').html('')
    jQuery.ajax({
        url:'log_reg_data.php',
        type:'post',
        data:jQuery('#frm-reg').serialize(),
        success:function(res){
            console.log(res);   
          let data=jQuery. parseJSON(res);
          if(data.status=='error'){
            jQuery('#'+data.field).html(data.msg).css('color:red');
          }
          if(data.status=='success'){
            jQuery('#'+data.field).html(data.msg);
            jQuery("#frm-reg") [0].reset();
          }
            
        },
    })
    e.preventDefault();
})




/*---------------------login logic--------------------------------*/
  jQuery("#frm-login").on('submit',function(e){
    jQuery('#email_sucs').html('')
    jQuery.ajax({
        url:'log_reg_data.php',
        type:'post',
        data:jQuery('#frm-login').serialize(),
        success:function(res){
            console.log(res);
          let data=jQuery. parseJSON(res);
          if(data.status=='error'){
            jQuery('#email_sucs').html(data.msg);
          }
          if(data.status=='success'){
            // jQuery('#email_sucs').html(data.msg);
            // jQuery('#frm-login') [0].reset();
            window.location.href='index.php';
          }
            
        }
    })
    e.preventDefault();
  })



  