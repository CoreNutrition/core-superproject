<div class="content-item grid-item <?php echo $content_item_size; ?>">
	<?php
		//push title copy and link into var so we can place it based on user selection
		$zIndex = 200+$item_counter;
		//if listing details field is present foer title, use that
		if (get_field("listing_page_headline",$content_item_id)) {
			$item_title = get_field("listing_page_headline",$content_item_id);
		} else {
			//otherwise use the page / post title
			$item_title = get_the_title($content_item_id);
		}
		$copy = "<div class='content-copy ".$header_position."' style='z-index:".$zIndex."'>";
		$copy .= "<h2>".$item_title."</h2>";
		if (isset($content_excerpt)) {
			$copy .= "<p class='excerpt'>".wp_trim_excerpt($content_excerpt)."</p>";
		}
		$copy .= "<img src='".get_stylesheet_directory_uri()."/dist/images/Arrow.svg' alt='Arrow' width='50'>";
		$copy .= "</div>";

		
		echo "<a class='animsition-link' href='".get_the_permalink($content_item_id)."'>";
		if ( $header_position == "outsidetop" || $header_position == "overtop" ) {
			echo $copy;
		}
		//if featured image exists
		if ( $header_position == "outsidetop" || $header_position == "overtop" || $header_position == "outsidebottom" || $header_position == "overbottom" || $header_position == "") {
			if ( get_the_post_thumbnail( $content_item_id ) ) {
				echo "<div class='row content-image'>";
					if ($item_counter==2 && $header_position != "") {
						$span = 10;
					} else {
						$span = 12;
					}
					echo "<div class='col-md-".$span."''>";
						echo get_the_post_thumbnail( $content_item_id, 'large' );
					echo "</div>";
				echo "</div>";
			}
		}
		if ( $header_position == "outsidebottom" || $header_position == "overbottom" || $header_position == "" ) {
			echo $copy;
		}
		if ( $header_position == "right" || $header_position == "left" ) {
			//this is setup differently than above
			echo "<div class='row justify'>";
				echo "<div class='col-md-6'>";
					if ( $header_position == "left") {
						echo $copy;
					} else {
						echo get_the_post_thumbnail( $content_item_id, 'large' );
					}
				echo "</div>";
				echo "<div class='col-md-6'>";
					if ( $header_position == "left") {
						echo get_the_post_thumbnail( $content_item_id, 'large' );
					} else {
						echo $copy;
					}
				echo "</div>";
			echo "</div>";
		}
		echo "</a>";
	?>
</div>