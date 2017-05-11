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
	</section>
	
	
	
	<section class="lifestyle">
	<?php
		$lifestyle_photos = get_field('lifestyle_photos');
		$lifestyle_callout_text = get_field('lifestyle_callout_text');
		$counter = 1;

		if( $lifestyle_photos ):
			echo "<div class='featured-posts grid'>";
				foreach( $lifestyle_photos as $lifestyle_photo ): 
        			echo "<div class='grid-item'>";
        				echo "<img src='".$lifestyle_photo['sizes']['medium']."' alt='".$lifestyle_photo['alt']."' />";
       				echo "</div>";
            	endforeach;
            	echo "<div class='grid-sizer'></div>";
            	echo "<div class='gutter-sizer'></div>";
            echo "</div>";
        endif;
        //echo $lifestyle_callout_text; 
    ?>  
	</section>
	
<?php endwhile; ?>
