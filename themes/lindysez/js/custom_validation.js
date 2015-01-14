
        jQuery(document).ready(function() { 

					
		         jQuery("#submit").click(function() {

							   valid=new Array();			   
							   var email=jQuery('#email').val();
							  
								if(email=="") 
								{ 
									jQuery('#email').css("border","1px solid #F7023B");
																
								}	
								else{ 
									jQuery('#email').css("border","1px solid #D5D5D5");
								}	
				  });
			
		    });	
