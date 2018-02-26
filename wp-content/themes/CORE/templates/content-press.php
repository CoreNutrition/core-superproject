<div class="col-md-3 col-6 press-item">
	<div class="press-overlays">
	<?php 
	if ($press_clipping) {
		echo "<a href='".$press_clipping['sizes']['large']."' title='".__('See the press clipping','sage')."' data-lity data-lity-desc='".$press_clipping['alt']."'>";
		echo '<i class="fa fa-paperclip fa-lg" aria-hidden="true"></i>';
		echo "</a>";
	} 
	if ($press_link) {
		echo "<a href='".$press_link."' target='_blank'>";
		echo '<i class="fa fa-external-link fa-lg" aria-hidden="true"></i>';
		echo "</a>";
	}

	?>
	</div>

	<img src="<?php echo $publication_logo['sizes']['square']; ?>" alt="<?php echo $publication_logo['alt']; ?>">
	
	<?php 
	echo "<h3>";
		if ($press_link) {
			echo "<a class='press_logo_link' href='".$press_link."'>";
		}
		echo $press_title;
		
		if ($press_link) {
			echo " <img src='".get_stylesheet_directory_uri()."/dist/images/Arrow.svg' alt='Arrow' width='35'>";
			echo "</a>";
		}
	echo "</h3>";

	?>
</div>
