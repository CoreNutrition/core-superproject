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
	
	<section class="container">
		<div class="row">
			<div class="col-12">
				<div class="featured-posts grid">
		
					<?php
					// check if the repeater field has rows of data
					$item_counter = 0;
					if( have_rows('content_posts') ):
						//is the mailchimp signup configured?
						$mailchimp_user_id = get_field('mailchimp_user_id');
						$mailchimp_list_id = get_field('mailchimp_list_id');
						$show_email_signup = false;	
						$email_signup_printed = false; //since this will be isnide a loop, we only want to show the email signup form once, set this to true once the block is printed.
						if ($mailchimp_user_id && $mailchimp_list_id) {
							//if the user ID and list ID exist, get the rest of the data
							$show_email_signup = true;	
							$signup_title = get_field('signup_title');
							$mailchimp_list_id = get_field('mailchimp_list_id');
							$email_images = get_field('email_images');
							$email_images_url = get_field('email_images_url');
						}

						// loop through the rows of data
						while ( have_rows('content_posts') ) : the_row();
							$item_counter++;
							$content_item_id = get_sub_field('content_item');
							$content_item_size = get_sub_field('content_item_size');
							$header_position = get_sub_field('header_position');	
							//setup the email signup form
							include( locate_template( 'templates/content-item.php' ) );
							if (isset($show_email_signup) && $show_email_signup && !$email_signup_printed && $item_counter == 3) {
								$email_signup_printed = true;
								include( locate_template( 'templates/content-mailchimp.php' ) );
							}
			            endwhile;
					endif; 
					?>
					<div class="grid-sizer"></div>
					<div class="gutter-sizer"></div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="container">
		<div class="row">
			<div class="col-12">
				<div class="lifestyle">
					<?php
						$lifestyle_photos = get_field('lifestyle_photos');
						$lifestyle_callout_text = get_field('lifestyle_callout_text');
						$lifestyle_url = get_field('lifestyle_url');
						$counter = 1;

						if( $lifestyle_photos ):
							//start the row
				        	echo "<div class='row'>";
							foreach( $lifestyle_photos as $lifestyle_photo ): 
				        		if ($counter==1) {	
				        			echo "<div class='col-md-3 offset-md-3 col-6 image'>";
				        		} else {
				        			echo "<div class='col-md-3 col-6 image'>";
				        		}
				        		if ($lifestyle_url) {
				        			echo "<a href='".$lifestyle_url."'>";
				        		}
				        		echo "<img src='".$lifestyle_photo['sizes']['medium']."' alt='".$lifestyle_photo['alt']."' />";
				        		if ($lifestyle_url) {
				        			echo "</a>";
				        		}
				        		echo "</div>";
				        		
				        		if ($counter==3) {	
				        			$counter=1;
				        		} else {
				        			$counter++;
				        		}
				            endforeach; 
				            //close the row
				        	echo "</div>"; ?>
				            <div class="lifestyle-caption">
				            	<?php echo $lifestyle_callout_text; ?>
				            </div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	
<?php endwhile; ?>
