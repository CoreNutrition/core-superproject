<header class="banner">
  <div class="container">    
    <div class="row">
    	<div class="col-md-2">
    		<?php
    			$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			?>
    		<a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>"></a>
    	</div>
    	<div class="col-md-8">
    		<nav class="nav-primary">
      		<?php
      			if (has_nav_menu('primary_navigation')) :
        			wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      			endif;
      		?>
    		</nav>
    	
    	</div>
    	<div class="col-md-2">
    		Social
    	</div>
    </div>
  </div>
</header>
