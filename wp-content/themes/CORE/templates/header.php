<header class="banner">
  <div class="container main-header">
    <div class="row header-row">
      <div class="col-md-2 brand-logo-wrapper">
    		<?php
    			$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			?>
    		<a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>"></a>
    	</div>
    	<div class="col-md-8">
    		<nav class="nav-primary">
          <a href="#menu" class="menu-link">&#9776;</a>
          <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'resposnive_nav', 'menu_id' => 'menu']);
            endif;
          ?>
        </nav>

    	</div>
    	<div class="col-md-2 social-channels">
        <a href="https://www.facebook.com/CoreHydration" target="_blank" style="color: #000;" class="no-style" onclick="return trackOutboundLink('https://www.facebook.com/CoreHydration', true)">
          <i class="fa fa-facebook" aria-hidden="true"></i></a>
           &nbsp; &nbsp;
        <a href="https://twitter.com/COREdrinks" target="_blank" style="color: #000;" class="no-style" onclick="return trackOutboundLink('https://twitter.com/COREdrinks', true)">
          <i class="fa fa-twitter" aria-hidden="true"></i></a>
          &nbsp; &nbsp;
        <a href="https://www.instagram.com/CORE/" target="_blank" style="color: #000;" class="no-style" onclick="return trackOutboundLink('https://www.instagram.com/CORE/', true)">
          <i class="fa fa-instagram" aria-hidden="true"></i></a>
    	</div>
    </div>
  </div>
</header>
