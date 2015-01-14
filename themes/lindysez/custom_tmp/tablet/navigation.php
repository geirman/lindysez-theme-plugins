<div class="navigation1">
  <div class="wrapper">
    <div class="container-fluid navigation_inner">
      <div class="row">
        <div class="col-sm-8 col-md-7 menu">
				<!-- MAIN NAVIGATION STARTS HERE -->
					<?php wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul class="nav">%3$s</ul>','menu_class' => 'nav-collapse collapse', )); ?>				
				<!-- MAIN NAVIGATION ENDS HERE -->	
        </div>
        <div class="col-sm-4 col-md-5 search">
					<div id="sb-search" class="sb-search">
						<form action="<?php echo home_url(); ?>">
							<input name="s" class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input name='s_submit' class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>	  
          <h4><?php echo date('F d, Y');?></h4>
        </div>
      </div>
    </div>
  </div>
</div>