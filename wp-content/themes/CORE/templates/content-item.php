<div class="content-item grid-item <?php echo $content_item_size; ?>">
	<?php
		//push title copy and link into var so we can place it based on user selection
		$zIndex = 200+$item_counter;
		$copy = "<div class='content-copy ".$header_position."' style='z-index:".$zIndex."'>";
		$copy .= "";
		$copy .= "<h2><a class='animsition-link' href='".get_the_permalink($content_item_id)."'>".get_the_title($content_item_id)."</a></h2>";
		if (isset($content_excerpt)) {
			$copy .= "<p class='excerpt'>".wp_trim_excerpt($content_excerpt)."</p>";
		}
		$copy .= "<a class='animsition-link' href='".get_the_permalink($content_item_id)."'>";
		$copy .= "<img src='".get_stylesheet_directory_uri()."/dist/images/Arrow.svg' alt='Arrow' width='50'>";
		$copy .= "</a></div>";
		
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
					echo "<div class='col-md-".$span."'>";
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
						echo '<a class="animsition-link" href="'.get_the_permalink($content_item_id).'">';
						echo get_the_post_thumbnail( $content_item_id, 'large' );
						echo '</a>';
					}
				echo "</div>";
				echo "<div class='col-md-6'>";
					if ( $header_position == "left") {
						echo '<a class="animsition-link" href="'.get_the_permalink($content_item_id).'">';
						echo get_the_post_thumbnail( $content_item_id, 'large' );
						echo '</a>';
					} else {
						echo $copy;
					}
				echo "</div>";
			echo "</div>";
		}
		
	?>
</div>