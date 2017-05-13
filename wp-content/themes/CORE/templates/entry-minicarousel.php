<?php /* Mini-carousel template utilizaing OwlCarousel2 JS library */ ?>
<?php if( have_rows('mini_carousel_repeater') ): ?>
	<div class="mini-carousel owl-carousel owl-theme owl-loaded owl-drag">
    	<?php while( have_rows('mini_carousel_repeater') ): the_row();
      		$image = get_sub_field('image');
      		?>
      		<div class="slide">
        		<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt'] ?>" />
          		<p class="caption"><?php the_sub_field('caption'); ?></p>
      		</div>
    	<?php endwhile; ?>
	</div>
<?php endif; ?>
