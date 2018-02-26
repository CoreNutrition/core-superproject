<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVKNLJJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>
  //set var for fb pixel code, if not reset with another trigger, use this default
  var fb_trigger = "PageView";
</script>
<header class="banner">
  <div class="container main-header">
    <div class="row header-row">
      <div class="col-6 col-md-3 col-lg-2 brand-logo-wrapper">
    		<?php
    			$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			?>
    		<a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>"></a>
    	</div>
    	<div class="col-4 col-md-7 col-lg-8">
    		<nav class="nav-primary panel">
          
          <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
            endif;
          ?>
        </nav>
    	</div>
    	<div class="col-2 col-md-2 col-lg-2 top-right">
        <!--<a href="#menu" class="menu-link">&#9776;</a>-->
        <a id="nav-toggle" class="hamburger" href="#menu"><span></span></a>
        <div class="social-channels">
          <a href="https://www.facebook.com/CoreHydration" target="_blank">
            <i class="fa fa-facebook" aria-hidden="true"></i></a>
             &nbsp; &nbsp;
          <a href="https://twitter.com/COREdrinks" target="_blank">
            <i class="fa fa-twitter" aria-hidden="true"></i></a>
            &nbsp; &nbsp;
          <a href="https://www.instagram.com/CORE/" target="_blank">
            <i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
    	</div>
    </div>
  </div>
</header>