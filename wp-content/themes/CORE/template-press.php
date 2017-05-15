<?php
/**
 * Template Name: Press
 */
?>

<?php while (have_posts()) : the_post(); ?>
	
    <?php get_template_part('templates/page', 'header'); ?>
    
	<section class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
            		
            		
                </div>
            </div>
        </div>
	</section>
	

	
<?php endwhile; ?>
