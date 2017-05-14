<div class="col-md-4 nutrition-item">
	<div class="product-image">
		<img src="<?php echo $product_image['sizes']['square']; ?>" alt="<?php echo $product_image['alt']; ?>">
	</div>
	<div class="product-name">
		<h2><?php echo $product_name; ?></h2>
	</div>
	<div class="product-btn">
		<a href="#" class="black-btn" data-toggle="modal" data-target="#<?php echo str_replace(' ', '', $product_name); ?>"><?php _e("Nutritional Facts", "sage"); ?></a>
	</div>
</div>
<!-- Modal -->
<div class="modal animated fadeIn" id="<?php echo str_replace(' ', '', $product_name); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo str_replace(' ', '', $product_name); ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content container" style="background: <?php echo $product_color; ?>">
	    <div class="row">
	    	<div class="col-md-10">
	        	<h2><?php echo $product_name; ?></h2>
	        </div>
	        <div class="col-md-2">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	        </div>
	    </div>
		<div class="row">
	      	<div class="col-md-6">
		   
				<div>
					<?php echo $nutritional_info; ?>
				</div>
	      	</div>
	      	<div class="col-md-6">
	      		<img src="<?php echo $nutrition_facts_label['sizes']['medium']; ?>" alt="<?php echo $nutrition_facts_label['alt']; ?>" />
	      	</div>
	    </div>      
    </div>
  </div>
</div>