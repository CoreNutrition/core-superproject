<div class="owl-carousel">
<?php

// check if the repeater field has rows of data
if( have_rows('featured_slideshow') ):

 	// loop through the rows of data
    while ( have_rows('featured_slideshow') ) : the_row();
		$title = get_sub_field('slide_title');
		$image = get_sub_field('slide_image');
		$color_scheme = get_sub_field('color_scheme');
		
		$button_text = get_sub_field('button_text');
		$button_link = get_sub_field('button_link');
		$video_embed = get_sub_field('video_embed');
		
		?>
		<div class="item" style="background-image:url('<?php echo $image['url']; ?>');">
            <!--<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />-->
            <?php if ($title) { ?>
            <div class="container overlay-content">
              <div class="row">
                  <h1 class="feature <?php echo $color_scheme; ?>"> <?php echo $title; ?></h1>
                  <?php if ($button_text && $button_link) { ?>
                  <a href="<?php echo $button_link; ?>" class="white-btn"><?php echo $button_text; ?></a>
                  <?php } ?>
              </div>
              <?php if ($video_embed) { ?>
              	<a href="#" data-toggle="modal" data-target="#modal" class="play hidden-xs"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/play-button.svg" alt="<?php _e("Play video","sage"); ?>"></a>
              <?php } ?>
            </div>
            <?php } ?>
            
          </div>
		<?php
    endwhile;
endif;

?>
</div>