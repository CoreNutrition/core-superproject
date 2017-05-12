<?php
/**
 * Template Name: Listing Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
	
	<section class="listing">
		<?php 
		
		$select_page_array = get_field("select_page");
		foreach ($select_page_array as $page_id) {
    		if ( get_the_post_thumbnail( $page_id ) ) {
    			echo "<div class='listing-feature' style='background-image:url(".get_the_post_thumbnail_url( $page_id, 'large' ).");'>";
    			
    		}
		}
		
		?>
	</section>
	

	
<?php endwhile; ?>
