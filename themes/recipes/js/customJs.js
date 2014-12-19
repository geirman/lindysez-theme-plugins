	jQuery(document).ready(function () {
		jQuery('.carousel').carousel({
			interval: 7000
		});
		jQuery('.carousel').carousel('cycle');
	});
	
	
				$(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        beforeShow: function () {
            if (this.title) {
                // New line
                this.title += '<br />';
                
                // Add tweet button
                this.title += '<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-url="' + this.href + '">Tweet</a> ';
                
                // Add FaceBook like button
               // this.title += 'vgdfggfgdgdg';
            }
        },
        afterShow: function() {
            // Render tweet button
            twttr.widgets.load();
        },
        helpers : {
            title : {
                type: 'inside'
            }
        }  
    });	