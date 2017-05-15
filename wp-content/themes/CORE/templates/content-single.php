<?php use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php //get_template_part('templates/entry-meta'); ?>
          </header>
          <div class="entry-content">
            <?php
              //If there's a featured images, show it.
              /*if (has_post_thumbnail()) {
                echo "<div class='post-featured'>";
                  the_post_thumbnail('large');
                echo "</div>";
              }*/ ?>
            <div class="row">
              <div class="col-md-10 offset-md-1">
                <?php the_content(); ?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
   
    <footer class="article-footer">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="related-title">
              <?php _e("Continue Reading...","sage"); ?>
            </div>
            <div class="row">
               <?php 
                  $related_posts = Extras\get_related_posts($post);
                  $max = 3;
                  $current = 0;
                  while ( $related_posts->have_posts() ) {
                      $related_posts->the_post();
                      if ($current < $max) {
                        echo '<div class="col-md-4">';
                          //$media = get_attached_media( 'image', $post->ID );
                          //echo count($media);

                          if (has_post_thumbnail()) {
                             echo "<div class='related_image'>";
                              echo '<a href="'.get_the_permalink().'">';
                                the_post_thumbnail('medium');
                              echo '</a>';
                             echo '</div>';
                          } else {
                            //see if there are any images within the post we can use

                          }
                          echo "<div class='related_link'>";
                            echo '<a href="'.get_the_permalink().'">';
                              echo '<h2>';
                                echo get_the_title();
                              echo '</h2>';
                              echo '<img src="'.get_stylesheet_directory_uri().'/dist/images/Arrow.svg" alt="Arrow" width="50">';
                            echo '</a>';
                          echo '</div>';
                        echo '</div>';
                        $current++;
                      }
                  }
                  /* Restore original Post Data */
                  wp_reset_postdata();
                ?>
            </div>
          </div>
        </div>
      </div>
     
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
