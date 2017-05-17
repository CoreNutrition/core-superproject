<?php use Roots\Sage\Titles; ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="page-header">
			<?php
			  if (get_field('header_color')) {
			  	$header_style = " style='color:".get_field('header_color')."'";
			  } else {
			  	$header_style="";
			  } ?>
			  <h1<?php echo $header_style; ?>><?= Titles\title(); ?></h1>
			</div>
		</div>
	</div>
</div>
