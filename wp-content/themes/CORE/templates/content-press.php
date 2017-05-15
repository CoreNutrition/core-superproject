<div class="col-md-3 col-sm-6 press-item">
	<?php 
	if ($press_clipping) {
		echo "<a class='press_logo_image' href='".$press_clipping['sizes']['large']."' data-lity data-lity-desc='".$press_clipping['alt']."'>";
	} ?>
	<img src="<?php echo $publication_logo['sizes']['square']; ?>" alt="<?php echo $publication_logo['alt']; ?>">
	<?php
	if ($press_clipping) {
		echo "</a>";
	} ?>

	<?php
	if ($press_link) {
		echo "<a class='press_logo_link' href='".$press_link."' target='_blank'><span class='small'>".__("Read article","sage")."</small></a>";
	}
	?>
</div>
