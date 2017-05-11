<?php
/**
 * Template Name: Homepage
 */
?>

<?php while (have_posts()) : the_post(); ?>
	
	<section class="hero">
		<div class="slider">
			<?php include( locate_template( 'templates/content-slideshow.php' ) );	 ?>
		</div>
	</section>
	
	<section class="featured-posts grid">
		
		<?php
		// check if the repeater field has rows of data
		if( have_rows('content_posts') ):
			// loop through the rows of data
			while ( have_rows('content_posts') ) : the_row();
				$content_item_id = get_sub_field('content_item');
				$content_item_size = get_sub_field('content_item_size');
				$header_position = get_sub_field('header_position');
				include( locate_template( 'templates/content-item.php' ) );
            endwhile;
		endif; 
		?>
		<div class="grid-sizer"></div>
	</section>
	
	<section class="lifestyle">
	<?php
		$lifestyle_photos = get_field('lifestyle_photos');
		$lifestyle_callout_text = get_field('lifestyle_callout_text');
		$counter = 1;

		if( $lifestyle_photos ):
			foreach( $lifestyle_photos as $lifestyle_photo ): 
        		if ($counter==1) {
        			//start the row
        			echo "<div class='row'>";
        			echo "<div class='col-md-3 offset-md-3 image'>";
        		} else {
        			echo "<div class='col-md-3 image'>";
        		}
        		
        		echo "<img src='".$lifestyle_photo['sizes']['medium']."' alt='".$lifestyle_photo['alt']."' />";
        		echo "</div>";
        		
        		if ($counter==3) {
        			//close the row
        			echo "</div>";
        			$counter=1;
        		} else {
        			$counter++;
        		}
            endforeach; ?>
            <div class="lifestyle-caption">
            	<?php echo $lifestyle_callout_text; ?>
            </div>
	<?php endif; ?>
	</section>
	
<?php endwhile; ?>
