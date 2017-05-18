<div class="col-md-4 nutrition-item">
	<div class="product-image">
		<a href="#<?php echo str_replace(' ', '', $product_name); ?>" data-lity>
			<img src="<?php echo $product_image['sizes']['square']; ?>" alt="<?php echo $product_image['alt']; ?>">
		</a>
	</div>
	<div class="product-name">
		<h2><?php echo $product_name; ?></h2>
	</div>
	<div class="product-btn">
		<a href="#<?php echo str_replace(' ', '', $product_name); ?>" class="black-btn" data-lity><?php _e("Nutritional Facts", "sage"); ?></a>
	</div>
	<!-- Modal -->
	<div class="modal-label animated fadeIn lity-hide container" id="<?php echo str_replace(' ', '', $product_name); ?>" tabindex="-1" style="background: <?php echo $product_color; ?>">
	 	<div class="row" style="padding: 2rem 1.333rem;">
			<div class="col-md-6">
				<div>
					<h2><?php echo $product_name; ?></h2>
					<?php echo $nutritional_info; ?>
				</div>
		    </div>
		    <div class="col-md-6">
		    <img src="<?php echo $nutrition_facts_label['sizes']['medium']; ?>" alt="<?php echo $nutrition_facts_label['alt']; ?>" />
		    </div>
		</div>
	</div>
</div>