			$(function(){
				var gallery = $('#images');
				gallery.exposure({controlsTarget : '#controls',
					controls : { prevNext : true, pageNumbers : true, firstLast : false },
				});
			});
			
	jQuery(".accordion-toggle").click(function(){
		
		if(jQuery(this).find('span').hasClass('plus')){
		
			jQuery(this).find('span').addClass('minus');
			jQuery(this).find('span').removeClass('plus');
			jQuery(".custom").removeClass('custom1');
			jQuery(this).find('span').addClass('custom1')
		}
		else{
		
			jQuery(this).find('span').addClass('plus');
			jQuery(this).find('span').removeClass('minus')
		}
		jQuery(".custom").each(function(){
			if(!$(this).hasClass("custom1")){
				$(this).addClass('plus');
				$(this).removeClass('minus')
			}
		})
	})

  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
    grabCursor: true,
    paginationClickable: true
  })
  jQuery('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  jQuery('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })	