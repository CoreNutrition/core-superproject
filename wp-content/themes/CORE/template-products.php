<?php
/**
 * Template Name: Products
 */
?>

<?php while (have_posts()) : the_post(); ?>

	<div class="page-header">
		<h1><?php the_title(); ?></h1>
	</div>
	
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
	
	<section class="facts padded" style="<?php echo get_field('facts_gradient_css'); ?>">
		<?php 
			$fact_graphic = get_field('fact_graphic');
			$fact = get_field('fact');
			if (get_field('graphic_display_mode') == "above") {
					
				if ($fact_graphic) {
					echo "<img src='".$fact_graphic['sizes']['large']."' alt='".$fact_graphic['alt']."' />";
				}
				if ($fact) {
					echo "<div class='content-horizontal'>";
						echo $fact;
					echo "</div>";
				}
			} else{
				echo "<div class='row side-by-side'>";
					echo "<div class='col-md-6'>";
						echo "<img src='".$fact_graphic['sizes']['large']."' alt='".$fact_graphic['alt']."' />";
					echo "</div>";
					echo "<div class='col-md-6'>";
						echo $fact;
					echo "</div>";
				echo "</div>";
			}
		?>

	
	</section>
	
	
	<section class="icon-slideshow" >
		<div class="row">
			<div class="col-md-4 offset-md-1">
				<?php get_template_part('templates/entry-minicarousel'); ?>
			</div>
			<div class="col-md-5 offset-md-1">
				<?php echo get_field('carousel_description'); ?>
			</div>
		</div>
		
	</section>
	
	
	
	
	<!-- Bottle Design Row -->
	<?php 
		$bottle_facts_background = get_field('row_background_image');
		$bottle_facts_description = get_field('intro'); 
	?>
	<?php if ($bottle_facts_description) { ?>
	<section class="bottle-facts padded" style="background-image:url('<?php echo $bottle_facts_background['sizes']['large']; ?>');">
		<div class="row">
			<div class="col-md-6 offset-md-6">
				<?php echo $bottle_facts_description; ?>
			</div>
		</div>
	</section>
	<?php } ?>
	<!-- END -->
	
	
	<!-- Product Availability -->
	<section class="product_availability">
		<div class="row">
			<div class="col-md-5">
				<div class="product_availability_headline">
					<?php echo get_field('availability_headline'); ?>
				</div>
				<?php if (get_field('shop_now_url')) { ?>
				<div class="product_availability_link">
					<a href="<?php echo get_field('shop_now_url'); ?>" class="black-btn"><?php _e("Shop Now","sage"); ?></a>
				</div> 
				<?php } ?>
			</div>
			<div class="col-md-6 offset-md-1">
				<?php 
					$product_image = get_field('product_image'); 
					echo "<img src='".$product_image['sizes']['large']."' alt='".$product_image['alt']."' />";
				?>
			</div>
		</div>
	</section>
	<!-- END -->
	
	
	<!-- Nutritional Info -->
	<?php if( have_rows('product_nutritional_information') ){ ?>
	
	<section class="nutritional_info padded">
		<?php 	
		//there's only product, set this up 
		$total_rows = count(get_field('product_nutritional_information'));
		$row_col_counter = 0;
		$row_opened = false;
		while( have_rows('product_nutritional_information') ): the_row(); 
			
			// vars
			$product_name = get_sub_field('product_name');
			$nutritional_info = get_sub_field('nutritional_info');
			$nutrition_facts_label = get_sub_field('nutrition_facts_label');
			$product_image = get_sub_field('product_image');
			$product_color = get_sub_field('product_color');
		
			if ($total_rows > 1) {
				//setup multiple
				if ($row_col_counter<3 && !$row_opened) {
					echo "<div class='row nutrition-gridded'>";
					$row_opened = true;
				}
				
				include( locate_template( 'templates/content-item-nutrition.php' ) );
				
				if ($row_col_counter<3) {
					$row_col_counter++;
				}else {
					//close the row adn reset counter
					echo "</div>";
					$row_col_counter=0;
					$row_opened = false;
				}
			} else {
				//single product
				echo "<div class='row'>";
					echo "<div class='col-md-6'>";
						echo "<h2>".$product_name."</h2>";
						echo $nutritional_info;
					echo "</div>";
					echo "<div class='col-md-6'>";
						echo "<img src='".$nutrition_facts_label['sizes']['medium']."' alt='".$nutrition_facts_label['alt']."' />";
					echo "</div>";
				echo "</div>";	
			}
		endwhile;
		
		?>
	</section>
	
	<?php } ?>
	<!-- END -->
	
	
	<section class="lifestyle padded">
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
