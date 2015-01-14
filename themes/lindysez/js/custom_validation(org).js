
        jQuery(document).ready(function() { alert('hi');
           /* Add New Qualification */
            jQuery("#contact-submit").click(function(){ 
					   valid=new Array();
					   var name=$('#name').val();
					   var email=$('#email').val();
					   var message=$('#message').val();
					   var captcha=$('#captcha').val();
						if(name=="") 
						{ 
							$('#name').css("border","1px solid #F7023B");
							valid.push('name');
						}
						else{
							$('#name').css("border","1px solid #CCCCCC");						
						}
						if(cemail=="") 
						{ 
							$('#cemail').css("border","1px solid #F7023B");
							valid.push('cemail');
						}
						else{
							$('#cemail').css("border","1px solid #CCCCCC");						
						}
						if (validateEmail(cemail)) {
							$('#cemail').css("border","1px solid #CCCCCC");		
						}
						else {
							$('#cemail').css("border","1px solid #F7023B");	
							valid.push('cemail');
						}
						
						if(message=="") 
						{ 
							$('#message').css("border","1px solid #F7023B");
							valid.push('message');
						}	
						else{
							$('#message').css("border","1px solid #CCCCCC");						
						}						
						if(captcha=="") 
						{ 
							$('#captcha').css("border","1px solid #F7023B");
							valid.push('captcha');
						}
						else{
							$('#captcha').css("border","1px solid #CCCCCC");						
						}						
						
							  testing=valid.length;
							  valid=valid.reverse();

							 for (x in valid)
							  {
							  $('#'+x).focus()
							  }
							  if(testing>0){
							  return false;
							  }
			});
		});	
		function validateEmail(sEmail) {

    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (filter.test(sEmail)) {

        return true;

    }

    else {

        return false;

    }
}