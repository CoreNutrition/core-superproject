<footer class="content-info">
  <div class="container">
  	<div class="row">
  		<div class="col-md-3">
  			<?php
    			$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			?>
  			<a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>"></a>
  		</div>
  		<div class="col-md-9">
  			Footer nav
  		</div>
  	</div>

  	<div class="row secondary">
    	<div class="col-md-12">
           <!--<form role="form" class="bot-form">
            	<input type="text" class="form-control" placeholder="Your email address...">
                <button class="btn btn-default">Sign  up!</button>
            </form>-->
        </div>
    </div>
    <div class="row">
       	<div class="col-md-6 copyright">
           	<?php //dynamic_sidebar('sidebar-footer'); ?>
           	<p>&copy; <?php echo date("Y"); ?> &#8212; <?php echo get_bloginfo("name"); ?></p>
           </div>
        <div class="col-md-6 legal">
           	<nav class="nav-legal">
      		<?php
      			if (has_nav_menu('legal_navigation')) :
        			wp_nav_menu(['theme_location' => 'legal_navigation', 'menu_class' => 'nav']);
      			endif;
      		?>
    		</nav>
        </div>
    </div>

    
  </div>
</footer>
<!-- The Modal -->
<div id="video_core_modal" class="modal-core">
    <span class="close-modal-core">&times;</span>
    <!-- Modal content -->
    <div id="modal-core-content" class="modal-core-content"></div>
</div>
<!-- END Modal -->
