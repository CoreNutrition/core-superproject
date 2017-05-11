<div class="content-item grid-item half">
	<div class="row">
    	<form role="form" class="form-1">
        	<h3><?php echo get_field( "TBD");?></h3>
            <div class="col-xs-8 col-md-9">
            	<input type="text" class="form-control" placeholder="Your email address...">
            </div>
            <div class="col-xs-4 col-md-3">
            	<button class="btn btn-default">Sign  up!</button>
            </div>
        </form>
    </div>
    <div class="row">
		<?php if( have_rows('TBD') ): ?>
			<?php while( have_rows('TBD') ): the_row(); 
			// vars
		?>
			<div class="col-md-4 col-xs-4"><a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" alt="" class="img-responsive"></a></div>
			<?php endwhile; ?>
       	<?php endif; ?>
    </div>
</div>