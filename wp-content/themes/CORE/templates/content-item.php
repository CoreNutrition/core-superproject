<div class="content-item <?php echo $content_item_size; ?>">
	<?php
		//if featured image exists
		if ( get_the_post_thumbnail( $content_item_id ) ) {
			echo get_the_post_thumbnail( $content_item_id, 'large' );
		}
	?>
	<div class="content-headline">
		<h2>
		<?php
			echo get_the_title($content_item_id);
		?>
		</h2>
	</div>
</div>