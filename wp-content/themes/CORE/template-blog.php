<?php use Roots\Sage\Extras; ?>
<?php
/**
 * Template Name: Blog
 */
?>

<?php
$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
$the_query =  Extras\get_posts($paged);
$posts_array = $the_query->posts;
?>

<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="container">
	  	<div class="row">
	  		<div class="col-12">
	  			<div id="grid" class="featured-posts grid blog-listing">
				  	<?php
				  		$item_counter = 0;
				  		foreach ( $posts_array as $post ) : setup_postdata( $post );
				  			$item_counter++;
				  			$content_item_id = $post->ID;
							$content_item_size = get_field('featured_size',$post->ID)[0];
							if (!$content_item_size) {
								$content_item_size="one-third";
							}
							$content_excerpt = get_the_excerpt($post->ID);
							$header_position = ""; //this is used by homepage, so setting an empty one here since we're using the same template
				  			include( locate_template( 'templates/content-item.php' ) );
				  		endforeach;
				  	?>
				  	<div class="grid-sizer"></div>
				  	<div class="gutter-sizer"></div>
				</div> <!-- //End grid -->
			    <?php wp_reset_postdata();?>
			</div>
		</div>
	</div>


<?php endwhile; ?>

<div>
<?php the_posts_navigation(); ?>
</div>