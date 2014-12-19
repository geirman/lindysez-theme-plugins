// Starting Document.Ready Function



jQuery(document).ready(function() {

window.setInterval(forPrintButton, 1000);

function forPrintButton() { 
//shareaholic-share-buttons
var abc =$('.custom_print_button').length
var sharing =$('.shareaholic-share-button').length

if((abc=='0') && (sharing>2)){ 
	$('.shareaholic-share-buttons').append('<li class="shareaholic-share-button custom_print_li" title="Print" data-service="print" style="display: list-item;"><a class="custom_print_button" href="javascript:window.print()"><i class="shareaholic-service-icon service-printfriendly"></i></a></li>');
}
}

	function validateEmail(sEmail) { 
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

		if (filter.test(sEmail)) {			
			return '0';
		}
		else {
			$('#cemail').focus();
			return '1';
		}
	}
	
		jQuery('.reciepe_type_main ul li').live('click',function(){ 
			jQuery(this).addClass('active');
		});	
		

		
		jQuery('.custom_link_add').live('click',function(){ 
			jQuery(this).addClass('active');
		});
		
		
		jQuery('.video_mobile_image').live('click',function(){ 
				jQuery('.mobile_div_img').hide();
				jQuery('.mobile_div_video').show();	
				var id=$("#v_id").val();	
				autoPlayVideo(id);					
		});	
		
		jQuery('.show_image_rel').live('click',function(){ 
				var show_image=jQuery(this).attr('img_show');
				jQuery('.detail_images').removeClass('detail_current_image');
				jQuery('.'+show_image).addClass('detail_current_image');				
		});		
		
		jQuery('.recipe_tabs').live('click',function(){  
				jQuery('iframe').each(function(i) { 
				  this.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
				});
			  
		});		
		
		
		function autoPlayVideo(vcode){	
		  $(".mobile_div_video").css("margin-top","0px");
		  $(".mobile_div_video").html('<iframe width="100%" src="https://www.youtube.com/embed/'+vcode+'?autoplay=1&loop=0&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
		}	

		
				  jQuery('#stoptest').click(function () {
					$("#ytplayer").stopVideo();
				  });

		
	
		
		// Click for load more News		
		jQuery('#list_more_news_link').click(function(){
				$('.list_more_news_div').hide();
				//$('.list_more_news').show();
				$(".list_more_news" ).show( "fast", function() {
					// Animation complete.
				});				
		});
		
		// Click for load more Tips		
		jQuery('#list_more_tips_link').click(function(){
				$('.list_more_tips_div').hide();
				 $( ".list_more_tips" ).show( "fast", function() {
					// Animation complete.
				  });
				//$('.list_more_tips').show();				
		});	
		// Click for load more Tips		
		jQuery('#load_more_rec_mb').click(function(){
				$('.more_recipe').hide();
				// $( ".hottest_dish" ).show( "fast", function() {});
				  jQuery('.hottest_dish').animate({height: "show",width: "show"});
				//$('.list_more_tips').show();				
		});			
		
		


	// Rating System Code
	var rate_status;
	jQuery('.rates span').hover(function(){ 
			var itemCount = $(this).index()+2;
			var i = 0;
			while(i<itemCount){
					$('.rates span:nth-child('+ i +')').removeClass('off');
					i++;
			}
		
	},function(){
			var i = 0;
			jQuery('.rates span').addClass('off');
			while(i<rate_status){
					$('.rates span:nth-child('+ i +')').removeClass('off');
					i++;
			}
	});
	
	jQuery('.rates span').click(function(){
			
			rate_status = $(this).index()+2;
			
			jQuery('#selected_rating').attr('value',rate_status-1);
			
			var options = { 
			        target:        '#output',   // target element(s) to be updated with server response 
			        beforeSubmit:  function(){},  // pre-submit callback 
			        success:       function(){
													jQuery('#rate-product').fadeOut('slow',function(){
														jQuery('#output').fadeIn('slow');	
													});
											}
			    };
			
			jQuery('#rate-product').ajaxSubmit(options);
			
		});

		
	//==================================
	
	// Recipe submit form
	jQuery('#recipe-form').validate();	
	
		
	jQuery('#contact-submit').click(function(){	
	var email=$('#cemail').val();
		var custom_error=validateEmail(email);		
		if(custom_error=='1'){
			return false;
		}
		var contact_options = { 
       				 	target: '#message-sent',
        				beforeSubmit: function(){												
												$('#contact-loader').fadeIn('fast');
												$('#message-sent').fadeOut('fast');
										}, 
       					success: function(){
							
											$('#contact-loader').fadeOut('fast');
											$('#message-sent').fadeIn('fast');
											$('#contact-form').resetForm();
										}
    	}; 
		jQuery('#contact-form').ajaxSubmit(contact_options);
		return false;
	});	
	
	$(function () {
  $("#cemail").click(function() {
    $(this).css('border', "solid 1px red");  
  });
})


  jQuery(".submit_comment").live('click',function() { 
	var email=jQuery('#comment_email').val();
		
		if(email){
				
				var custom_error=validateEmail(email);	
				if(custom_error=='1'){ 
				jQuery('.comment_email').css('border', "solid 1px red");  
					return false;
				}
				var comment=jQuery(".comment_box").val();					
				if(comment.length!='0'){ 					
				}
				else{					
					jQuery('.comment_box').css('border', "solid 1px red"); 
					return false;
				}				
		}
		else{ 
				var comment=jQuery(".comment_box").val();					
				if(comment.length!='0'){ 					
				}
				else{					
					jQuery('.comment_box').css('border', "solid 1px red"); 
					return false;
				}			
		}
  })
  
   jQuery("#comment_email").live('change',function() { 
		var email=jQuery(this).val();
		jQuery("#comment_email").val(email);
  }) 
  
   jQuery(".comment_box").live('change',function() { 
		var value=jQuery(this).val();
		jQuery(".comment_box").val(value);
  })   

  

	
 	//==================================
  	
	
		// Click for load more item		
		jQuery('.load_more_recipe').click(function(){
				jQuery('.more_recipe_li').hide();
				jQuery('.hide_currently').animate({height: "show",width: "show"});
		});
		

	
	// Contact Form AJAX Function for Contact Page

	jQuery('#contact-form').validate();	
	
	
	
	
	$ = jQuery;
	
	//=========== Necessary CSS Targets
	
	jQuery('.nav li:first-child').css('background','none');
	jQuery('#home-infos .news .list li:last-child').css('padding','0px').css('margin','0px').css('background','none');
	jQuery('.tabed .block li:last-child').css('padding','0px').css('margin','0px').css('background','none');
	jQuery('#bottom > li:last-child').css('margin','0px');
	jQuery('#bottom li ul li:last-child').css('background','none').css('padding','0px');
	
	
	var nut_elements_count = $('#left-area .info-right .nutritional ul li').length;
	
	if( (nut_elements_count % 2) == 0 )
	{
		jQuery('#left-area .info-right .nutritional ul li:last-child').css('border','none').css('padding-bottom','0px');
		jQuery('#left-area .info-right .nutritional ul li:last-child').prev('li').css('border','none').css('padding-bottom','0px');
	}
	else
	{
		jQuery('#left-area .info-right .nutritional ul li:last-child').css('border','none').css('padding-bottom','0px');
	}
	
	//==================================
	
	
	//=========== Print page code
	
	jQuery('#print-page').click(function(){
		window.print();
		return false;	
	});
	
	//=========== Mail page code
	
	jQuery('#email-page').click(function(){
		mail_str = "mailto:?subject=Check out the " + document.title;
		mail_str += "&body=I thought you might be interested in the " + document.title;
		mail_str += ". You can view it at, " + location.href; 
		location.href = mail_str;
	});
	
	//=========== Bookmark page code
	
/*	$('#bookmark-page').click(function(){
		var bmURL = $(this).attr('href');
		var bmPageName = $(this).attr('title');
		external.AddFavorite(bmURL,bmPageName);
		return false;
	});*/
	
	//=============================
	
	//this function attached focus and blur events with input elements
	var addFocusAndBlur = function($input, $val){
		
		$input.focus(function(){
			if (this.value == $val) {this.value = '';}
		});
		
		$input.blur(function(){
			if (this.value == '') {this.value = $val;}
		});
	}

	// example code to attach the events
	addFocusAndBlur($('#s'),'Search for');
	addFocusAndBlur($('#cname'),'Name here');
	addFocusAndBlur($('#cemail'),'Email here');
	addFocusAndBlur($('#cmessage'),'Message');
	addFocusAndBlur($('#message'), 'Type your comments here');
	
	//==================================
	
	
	// Hover effects for Header and Footer Logos
	
	jQuery('#header .logo, .footer-logo').hover(function(){
		jQuery(this).stop(true, true).animate({opacity: 0.5},300);
	},function(){
		jQuery(this).stop(true, true).animate({opacity: 1},300);	
	});
	
	// Width Counter for Navigation
	
	var navWidthCounter = function(){
			var itemsCount = $('.nav > li').size();
			var allListWidth = 0;
			i = 0;
			while(i <= itemsCount){
					allListWidth += $('.nav > li:nth-child(' + i + ')').width();
					i++;
			}
			return allListWidth;
		}

	
	//==================================
	
	

	
	//==================================
	
	
	// Pretty Photo Relation Target
	
	jQuery$("a[rel^='prettyPhoto']").prettyPhoto(); 
	
	//==================================
	
	
	// Image hover effect for whole site
	
	jQuery('.img-box img, .single-img-box img, .img-box-serv img').not('.single-slider img').hover(function(){
			$(this).stop().animate({opacity:0.7},300);
	}, function(){
			$(this).stop().animate({opacity:1},300);
	});
	
	//==================================
	
	
	// Buttons and Pagination hover effects
	
	jQuery('.readmore, #pagination a').hover(function(){
           $(this).stop().animate({color: "#ccc" }, 650);
	}, function(){
			$(this).stop().animate({color: "#fff" }, 650);
	});
	
	
	//==================================
	
	
	// Cycle Slider Control for Basic and Right Info Slider
	
	jQuery('.slides.right-slider ul').cycle({ 
		fx:         'fade',
		easing:		'easeInOutSine',
		timeout:	7000,
		speed:		1500,
		pager:      '.sliderNav span'
	});
	
	jQuery('.slides.basic ul').cycle({ 
		fx:         'scrollHorz',
		easing:		'easeInOutSine',
		timeout:	5000,
		speed:		1000,
		delay:		6000,
		pager:      '.sliderNav span'
	});
	
	//==================================
	
	
	// Cycle Slider Control More Recipes on Recipe Single Pages More Recipes Widget
	
	jQuery('.more-recipes ul').cycle({ 
		    fx:         'scrollHorz',
			easing:		'easeInOutSine',
		    timeout:     0,
			next:		'.next',
			prev:		'.prev'
	});

	//==================================
	
	
	// Cycle Slider Control for Recipe Single Page Main Image
	
	if($('.single-slider img').length > 1)
	{
		$('.single-slider').cycle({
				fx:			'fade',
				easing:		'easeInOutSine',
				timeout:	6000,
				speed: 		2000,
				next:		'.next',
				prev:		'.prev',
				pager:		'.img-nav'
		});
	}
	else
	{
		$('.single-slider').next('.img-nav').hide();
	}
	//==================================
	
	
	// Cycle Slider Control for Thumbnail Slider

	jQuery('.thumb-slider').cycle({ 
		    fx:			'scrollHorz', 
		    speed:		900, 
		    timeout:	4000,
			easing:		'easeInOutSine',
		    pager:		'.sliderThumbs', 
		     
		    // callback fn that creates a thumbnail to use as pager anchor 
		    pagerAnchorBuilder: function(idx, slide) { 
		        	return '<li><a href="#"><img src="' + slide.src + '" width="130" height="53" /></a></li>'; 
		    } 
	});
	
	//==================================
	
	
	// Image Hover Effect for Slider Thumbs
	
	jQuery('.sliderThumbs li a img').hover(function(){
			$(this).stop().animate({opacity:0.7},300);
	}, function(){
			$(this).stop().animate({opacity:1},300);
	});
	
	//==================================
	
	
	//NIVO SLIDER

	jQuery('.nivo-slides').nivoSlider({

			effect:'boxRain,fold,fade', // Specify sets like: fold,fade,sliceDown,boxRain,random
			slices:25, // For slice animations
			boxCols: 16, // For box animations
			boxRows: 8, // For box animations
			animSpeed:600, // Slide transition speed
			pauseTime:6000, // How long each slide will show
			startSlide:0, // Set starting Slide (0 index)
			directionNav:true, // Next & Prev navigation
			directionNavHide:true, // Only show on hover
			controlNav:true, // circles navigation
			captionOpacity: 0.7
	});
	
	//==================================
	
	
	// Tabs Code for whole site
	
	jQuery('.tabed .tabs li:first-child').addClass('current');
	jQuery('.tabed .block:first').addClass('current');
	
	jQuery('.tabed .tabs li').click(function(){
			var tabNumber = $(this).index();
			$(this).parent('ul').siblings('.block').removeClass('current');
			$(this).siblings('li').removeClass('current');
			$(this).addClass('current');
			$(this).parent('ul').parent('.tabed').children('.block:eq('+ tabNumber +')').addClass('current');
	});
	
	//==================================
	
	
	// Accordion for Whole Site
	
	jQuery('.accordion h5').click(function(){
			if(!$(this).hasClass('current')){
					var tabNumber = $(this).index();
					$('.accordion .pane.current').slideUp(700, function(){ $(this).removeClass('current'); });
					$(this).next('.pane').show('blind',700,function(){ $(this).addClass('current'); });
					$('.accordion h5.current').removeClass('current');
					$(this).addClass('current');
			}
	});
	
	//==================================
	
	
	// Toggle Box Code for Whole Site

	jQuery('.toggle-box ul li p').slideUp('slow');
	jQuery('.toggle-box ul li h5').click(function(){
			if($(this).parent('li').hasClass('active')){
			  		$(this).stop(true, true).siblings('p').slideUp('slow');
					$(this).parent('li').removeClass('active');
			} else {
					$(this).stop(true, true).siblings('p').show('blind', 500);
					$(this).parent('li').addClass('active');
			}
	});
	
	//==================================
	
	
	// FAQ list counter for FAQ page
	
	var setFaqCount = function(){
			$('.faq-list li').each(function(index, element) {
	           	$(this).children('.number').prepend(index+1); 
	        });
		}
	setFaqCount();
	
	//==================================
	
	
	// FAQ Toggle Effect for FAQ Page
	
	jQuery('.faq-list li').children('p').slideUp();
	jQuery('.faq-list li.active').children('p').show('blind',1000);
	jQuery('.faq-list li h3').click(function(){
			if($(this).parent('li').hasClass('active')){
					$(this).siblings('p').slideUp(800);
					$(this).parent('li').removeClass('active');
			} else {
					$(this).parent('li').addClass('active');
					$(this).siblings('p').show('blind',800);
			}
	});
	
	//==================================
	
	
	// Recipe Single Carousel Code for Recipe Single Full Width Page
	
	var pieceWidth = jQuery('#horiz_container li').width() + parseInt($('#horiz_container li').css('padding-left')) + parseInt($('#horiz_container li').css('margin-left'));
	var pieceCount = jQuery('#horiz_container li').length;
	if(pieceCount/2 != 0){
			var outerWidth = pieceCount/2*pieceWidth+pieceWidth;
	} else {
			var outerWidth = pieceCount/2*pieceWidth;
	}
	jQuery('#horiz_container').css('width',outerWidth);
	var carStatus = 0;
	jQuery('#horiz_container_outer .right').click(function(){
			if(carStatus < (pieceCount/2)*pieceWidth-(pieceWidth+pieceWidth)){
					$('#horiz_container').animate({left: "-="+pieceWidth},500);
					carStatus += pieceWidth;
			}
	});
	jQuery('#horiz_container_outer .left').click(function(){
			if(carStatus > 0){
					$('#horiz_container').animate({left: "+="+pieceWidth},500);
					carStatus -= pieceWidth;
			}
	});
	
	//==================================
	
	
	// Recipe Single Full Width Page Image Switch Code from Carousel
	
	jQuery('#horiz_container li').click(function(){		
		var thisImgSrc = $(this).children('a').data('rel');
		var targetImgSrc = $('.single-img-box img').attr('src');		
		if(thisImgSrc != targetImgSrc)
		{
			$('.single-img-box img').fadeOut(200,function(){
					$('.recipe-single-img').addClass('withbg');
					$(this).attr('src',thisImgSrc);
					$(this).load(function(){
							$(this).fadeIn(200,function(){ $('.recipe-single-img').removeClass('withbg'); });
					});
			});
		}
	});
	
		
	//==================================
	
	
	// Slider Call for Accordion Slider
	
	if(jQuery('#accordion-slider').length > 0){
			slideMenu.build('accordion-slider',740,10,5,2);
	}
	 
	// Quick Connect Form AJAX validation and submition
	// Validation Plugin : http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// Form Ajax Plugin : http://www.malsup.com/jquery/form/

	
	//==================================
	
	

	
	
});

		



