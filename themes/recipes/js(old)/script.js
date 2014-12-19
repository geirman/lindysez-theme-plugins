// Starting Document.Ready Function

jQuery(document).ready(function() {
	
	$ = jQuery;
	
	//=========== Necessary CSS Targets
	
	$('.nav li:first-child').css('background','none');
	$('#home-infos .news .list li:last-child').css('padding','0px').css('margin','0px').css('background','none');
	$('.tabed .block li:last-child').css('padding','0px').css('margin','0px').css('background','none');
	$('#bottom > li:last-child').css('margin','0px');
	$('#bottom li ul li:last-child').css('background','none').css('padding','0px');
	
	
	var nut_elements_count = $('#left-area .info-right .nutritional ul li').length;
	
	if( (nut_elements_count % 2) == 0 )
	{
		$('#left-area .info-right .nutritional ul li:last-child').css('border','none').css('padding-bottom','0px');
		$('#left-area .info-right .nutritional ul li:last-child').prev('li').css('border','none').css('padding-bottom','0px');
	}
	else
	{
		$('#left-area .info-right .nutritional ul li:last-child').css('border','none').css('padding-bottom','0px');
	}
	
	//==================================
	
	
	//=========== Print page code
	
	$('#print-page').click(function(){
		window.print();
		return false;	
	});
	
	//=========== Mail page code
	
	$('#email-page').click(function(){
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
	
	$('#header .logo, .footer-logo').hover(function(){
		$(this).stop(true, true).animate({opacity: 0.5},300);
	},function(){
		$(this).stop(true, true).animate({opacity: 1},300);	
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
	
	var navWidth = navWidthCounter();
	if(navWidth > 780){
			$('.nav').after('<span class="nav-more"><a>More</a><ul></ul></span>');
			while(navWidth > 780){
			  		var lastoneis = $('.nav > li:last-child').html();
			  		$('.nav > li:last-child').remove();
					$('.nav-more ul').append('<li>' + lastoneis + '</li>');
					navWidth = navWidthCounter();
			}
	}
	
	//==================================
	
	
	// Navigation Hover
	
	$('#nav-wrap ul > li, .nav-more').hover(function(){
			$(this).stop(true, true).children('a').animate({color: "#B3C897" }, 200);
		  	$(this).children('ul').fadeIn(350);
	}, function(){
			$(this).stop(true, true).children('a').animate({color: "#fff"}, 200);
			$(this).children('ul').hide();
	});
	
	//==================================
	
	
	// Pretty Photo Relation Target
	
	$("a[rel^='prettyPhoto']").prettyPhoto(); 
	
	//==================================
	
	
	// Image hover effect for whole site
	
	$('.img-box img, .single-img-box img, .img-box-serv img').not('.single-slider img').hover(function(){
			$(this).stop().animate({opacity:0.7},300);
	}, function(){
			$(this).stop().animate({opacity:1},300);
	});
	
	//==================================
	
	
	// Buttons and Pagination hover effects
	
	$('.readmore, #pagination a').hover(function(){
           $(this).stop().animate({color: "#ccc" }, 650);
	}, function(){
			$(this).stop().animate({color: "#fff" }, 650);
	});
	
	
	//==================================
	
	
	// Cycle Slider Control for Basic and Right Info Slider
	
	$('.slides.right-slider ul').cycle({ 
		fx:         'fade',
		easing:		'easeInOutSine',
		timeout:	7000,
		speed:		1500,
		pager:      '.sliderNav span'
	});
	
	$('.slides.basic ul').cycle({ 
		fx:         'scrollHorz',
		easing:		'easeInOutSine',
		timeout:	5000,
		speed:		1000,
		delay:		6000,
		pager:      '.sliderNav span'
	});
	
	//==================================
	
	
	// Cycle Slider Control More Recipes on Recipe Single Pages More Recipes Widget
	
	$('.more-recipes ul').cycle({ 
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

	$('.thumb-slider').cycle({ 
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
	
	$('.sliderThumbs li a img').hover(function(){
			$(this).stop().animate({opacity:0.7},300);
	}, function(){
			$(this).stop().animate({opacity:1},300);
	});
	
	//==================================
	
	
	//NIVO SLIDER

	$('.nivo-slides').nivoSlider({

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
	
	$('.tabed .tabs li:first-child').addClass('current');
	$('.tabed .block:first').addClass('current');
	
	$('.tabed .tabs li').click(function(){
			var tabNumber = $(this).index();
			$(this).parent('ul').siblings('.block').removeClass('current');
			$(this).siblings('li').removeClass('current');
			$(this).addClass('current');
			$(this).parent('ul').parent('.tabed').children('.block:eq('+ tabNumber +')').addClass('current');
	});
	
	//==================================
	
	
	// Accordion for Whole Site
	
	$('.accordion h5').click(function(){
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

	$('.toggle-box ul li p').slideUp('slow');
	$('.toggle-box ul li h5').click(function(){
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
	
	$('.faq-list li').children('p').slideUp();
	$('.faq-list li.active').children('p').show('blind',1000);
	$('.faq-list li h3').click(function(){
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
	
	var pieceWidth = $('#horiz_container li').width() + parseInt($('#horiz_container li').css('padding-left')) + parseInt($('#horiz_container li').css('margin-left'));
	var pieceCount = $('#horiz_container li').length;
	if(pieceCount/2 != 0){
			var outerWidth = pieceCount/2*pieceWidth+pieceWidth;
	} else {
			var outerWidth = pieceCount/2*pieceWidth;
	}
	$('#horiz_container').css('width',outerWidth);
	var carStatus = 0;
	$('#horiz_container_outer .right').click(function(){
			if(carStatus < (pieceCount/2)*pieceWidth-(pieceWidth+pieceWidth)){
					$('#horiz_container').animate({left: "-="+pieceWidth},500);
					carStatus += pieceWidth;
			}
	});
	$('#horiz_container_outer .left').click(function(){
			if(carStatus > 0){
					$('#horiz_container').animate({left: "+="+pieceWidth},500);
					carStatus -= pieceWidth;
			}
	});
	
	//==================================
	
	
	// Recipe Single Full Width Page Image Switch Code from Carousel
	
	$('#horiz_container li').click(function(){		
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
	
	if($('#accordion-slider').length > 0){
			slideMenu.build('accordion-slider',740,10,5,2);
	}
	 
	// Quick Connect Form AJAX validation and submition
	// Validation Plugin : http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// Form Ajax Plugin : http://www.malsup.com/jquery/form/
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
		
	//==================================
  	
	
	// Contact Form AJAX Function for Contact Page

	$('#contact-form').validate({
			submitHandler: function(form) {
		   			$(form).ajaxSubmit(contact_options);
		   }
	});
	
	//==================================
	
	
	// Rating System Code
	var rate_status;
	$('#rate-product .rates span').hover(function(){
			var itemCount = $(this).index()+2;
			var i = 0;
			while(i<itemCount){
					$('#rate-product .rates span:nth-child('+ i +')').removeClass('off');
					i++;
			}
		
	},function(){
			var i = 0;
			$('#rate-product .rates span').addClass('off');
			while(i<rate_status){
					$('#rate-product .rates span:nth-child('+ i +')').removeClass('off');
					i++;
			}
	});
	$('#rate-product .rates span').click(function(){
			
			rate_status = $(this).index()+2;
			
			$('#selected_rating').attr('value',rate_status-1);
			
			var options = { 
			        target:        '#output',   // target element(s) to be updated with server response 
			        beforeSubmit:  function(){},  // pre-submit callback 
			        success:       function(){
													$('#rate-product').fadeOut('slow',function(){
														$('#output').fadeIn('slow');	
													});
											}
			    };
	
			$('#rate-product').ajaxSubmit(options);
			
		});
	
	//==================================
	
	// Recipe submit form
	$('#recipe-form').validate();
	
	
});


