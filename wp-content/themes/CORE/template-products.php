<?php
/**
 * Template Name: Products
 */
?>

<?php while (have_posts()) : the_post(); ?>
	
	<section class="hero">
		<div class="slider">
			<?php include( locate_template( 'templates/content-slideshow.php' ) );	 ?>
		</div>
		<div class="row slideshow-overlay">
			<div class="col-7 col-md-5 offset-md-1">
				<?php the_content(); ?>
			</div>
			<div class="col-5 col-md-4 offset-md-1 img-overlay">
			<?php $lifestyle_image_overlay = get_field('lifestyle_image_overlay');
				if ($lifestyle_image_overlay) {
					echo "<img src='".$lifestyle_image_overlay['sizes']['medium']."' alt='".$lifestyle_image_overlay['alt']."' />";
				}
			?>
			</div>
		</div>
	</section>
	
	<section class="facts" style="<?php echo get_field('facts_gradient_css'); ?>">
		<?php if (get_field('graphic_display_mode') == "above") {
					$fact_graphic = get_field('fact_graphic');
					$fact = get_field('fact');
					if ($fact_graphic) {
						echo "<img src='".$fact_graphic['sizes']['large']."' alt='".$fact_graphic['alt']."' />";
					}
					if ($fact) {
						echo "<div class='content-horizontal'>";
							echo $fact;
						echo "</div>";
					}
				}
		?>

	
	</section>
	
	<section class="lifestyle">
	<?php
		$lifestyle_photos = get_field('lifestyle_photos');
		$lifestyle_callout_text = get_field('lifestyle_callout_text');
		$counter = 1;

		if( $lifestyle_photos ):
			echo "<div class='featured-posts grid'>";
				foreach( $lifestyle_photos as $lifestyle_photo ): 
        			echo "<div class='grid-item half'>";
        				echo "<img src='".$lifestyle_photo['sizes']['medium']."' alt='".$lifestyle_photo['alt']."' />";
       				echo "</div>";
       				$counter ++;
       				if ( $counter == 2 ) {
       					echo "<div class='grid-item half content-box-offset'>";
        					echo "<h2>".$lifestyle_callout_text."</h2>";
       					echo "</div>";
       				}
            	endforeach;
            	echo "<div class='grid-sizer'></div>";
            	echo "<div class='gutter-sizer'></div>";
            echo "</div>";
        endif;
    ?>  
	</section>
	
<?php endwhile; ?>
