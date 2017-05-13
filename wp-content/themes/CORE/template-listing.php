<?php
/**
 * Template Name: Listing Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
	
	<section class="listing">
		<div class="page-header">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php 
		
		$select_page_array = get_field("select_page");
		foreach ($select_page_array as $page_id) {
    		if ( get_the_post_thumbnail( $page_id ) ) {
    			echo "<a href='".get_the_permalink($page_id)."'>";
    			echo "<div class='listing-feature' style='background-image:url(".get_the_post_thumbnail_url( $page_id, 'large' ).");'>";
    				echo "<div class='description content-box-offset'>";
    					echo "<div class='listing_header'>";
    						echo get_field("listing_page_headline",$page_id);
    					echo "</div>";
    					echo "<div class='listing_description'>";
    						echo get_field("listing_page_description",$page_id);
    					echo "</div>";
    					echo "<div class='arrow inverse'>";
    						echo "<img src='".get_stylesheet_directory_uri()."/dist/images/Arrow.svg' alt='Arrow' width='50'>";
    					echo "</div>";
    				echo "</div>";
    			echo "</div>";
    			echo "</a>";
    		}
		}
		
		?>
	</section>
	

	
<?php endwhile; ?>
