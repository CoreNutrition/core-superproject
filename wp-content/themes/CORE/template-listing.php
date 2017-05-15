<?php
/**
 * Template Name: Listing Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
	
    <?php get_template_part('templates/page', 'header'); ?>
    
	<section class="container">
        <div class="row">
            <div class="col-12">
                <div class="listing">
            		
            		<?php 
            		
            		$select_page_array = get_field("select_page");
            		foreach ($select_page_array as $page_id) {

                        $listing_page_image = get_field("listing_page_image",$page_id);
                        //choose what image to use
                        if ($listing_page_image) {
                            $this_page_image = $listing_page_image['sizes']['large'];
                        } else if(get_the_post_thumbnail( $page_id)) {
                            $this_page_image = get_the_post_thumbnail_url( $page_id, 'large' );
                        } else {
                            $this_page_image = "";
                        }
                		if ( $this_page_image ) {
                			echo "<a href='".get_the_permalink($page_id)."'>";
                			echo "<div class='listing-feature' style='background-image:url(".$this_page_image.");'>";
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
                </div>
            </div>
        </div>
	</section>
	

	
<?php endwhile; ?>
