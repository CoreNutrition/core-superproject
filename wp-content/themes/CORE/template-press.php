<?php
/**
 * Template Name: Press
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('templates/page', 'header'); ?>

	<section class="container">
        <div class="row">
            <div class="col-12">
                <div class="press">

                    <?php
                    // check if the repeater field has rows of data
                    $total_rows = count(get_field('press_stories'));
                    $row_col_counter = 1;
                    $row_opened = false;
                    if( have_rows('press_stories') ):
                        // loop through the rows of data
                        while ( have_rows('press_stories') ) : the_row();
                            $press_title = get_sub_field('press_title');
                            $press_link = get_sub_field('press_link');
                            $publication_logo = get_sub_field('publication_logo');
                            $press_clipping = get_sub_field('press_clipping');

                            if ($row_col_counter < 4 && !$row_opened) {
                                echo "<div class='row'>";
                                $row_opened = true;
                            }
                            include( locate_template( 'templates/content-press.php' ) );


                            if ($row_col_counter < 4) {
                                    $row_col_counter++;
                            } else {
                                //close the row adn reset counter
                                echo "</div>";
                                $row_col_counter=1;
                                $row_opened = false;
                            }

                        endwhile;
                    endif;
                    ?>

                </div>
            </div>
        </div>
	</section>



<?php endwhile; ?>
