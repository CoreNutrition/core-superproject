<?php
/**
 * Template Name: Special
 */
?>
<?php while (have_posts()) : the_post(); ?>
   <section>
   	  
      <div class="container">
      	<div class="row">
      	<div class="col-12">
	      <div class="page-header">
	          <h1>
	            <?php the_title(); ?>
	          </h1>

	      </div>
	    </div>
	    </div>
      <div id="ellie_header padded" class="row">
       
            <div class="col-md-6">
              <h2>
                SHOWS US WHAT IS AT HER CORE:
                MUSIC, FITNESS, STYLE  AND A LOVE OF CORE HYDRATION.
              </h2>
            </div>
            <div class="col-md-6">
              <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ellie/hero-header-ellie.jpg" />
            </div>
      </div>
      </div>

    <div class="container padded">
      <div class="row">
        <div class="col-12">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item"  src="https://player.vimeo.com/video/217851094?color=00d1fe&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>

        </div>
      </div>
    </div>

    <div class="container padded homepage-section">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <p class="text-center">
            “I am excited to be part of the CORE family and further motivate others to lead a healthy balanced life, something I aim to do.”<br>
            ELLIE GOULDING
          </p>
        </div>
      </div>
    </div>

    <div class="container padded">

      <div class="row">
        <div class="col-12">
          <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ellie/ellie-poster.jpg" />
        </div>
        
      </div>

    </div>


    <div class="padded" style="background-color: #efeff1;">
      <!-- Fitness -->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-xs-10 col-sm-12 offset-xs-1 offset-sm-0">
                <h2>
                  ELLIE TO THE CORE
                </h2>
                <h4>On Fitness</h4>
                <p>
                 “I have done a lot of workouts over the years, but the thing that has definitely made me feel the most confident and empowered is boxing and kickboxing. I love the extra kick of adrenalin. I think it is important to find a workout you really love.”
                </p>

                <div class="row">
                  <div class="col-xs-12 col-sm-9 col-md-8 offset-sm-3 offset-md-4">
                    <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ellie/ellie-fitness@2x.jpg" />
                  </div>
                </div>
                
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            
            <div class="row">

                <div class="col-xs-10 col-sm-12 offset-xs-1 offset-sm-0">
                  <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ellie/ellie-boxing@2x.jpg" />
                </div>

            </div>

          </div>

        </div>
      </div>
      <!-- END Fitness -->

      <!-- Beauty -->
      <div class="container padded">
        <div class="row">

          <div class="col-sm-6 push-sm-6">
            <div class="row">
              <div class="col-xs-10 col-sm-12 offset-xs-1 offset-sm-0">
                
                <h4>On Beauty</h4>
                <p>
                  “I also love to wear makeup. Even if I’m wearing tracksuit bottoms, I find putting make up on therapeutic.”
                </p>
                
              </div>
            </div>
          </div>

          <div class="col-sm-6 pull-sm-6">
            <div class="row">

                <div class="col-xs-10 col-sm-12 offset-xs-1 offset-sm-0">
                  <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ellie/ellie-beauty@2x.jpg" />
                </div>

            </div>
          </div>

        </div>
      </div>
      <!-- END Beauty -->

      <!-- Music & CORE -->
      <div class="container padded">
        <div class="row">

          <div class="col-sm-6">
            <div class="row">
              <div class="col-xs-10 col-sm-12 offset-xs-1 offset-sm-0">
                
                <h4>On Music</h4>
                <p>
                  “I'm not afraid, as a writer, of being emotional. I'm obsessed 
with human emotion, body parts, physicality.”
                </p>
                
                <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ellie/ellie-music@2x.jpg" />
              </div>
            </div>
          </div>

          <div class="col-sm-6 pullup">
            <div class="row">

                <div class="col-xs-10 col-sm-9 col-md-8 offset-xs-1 offset-sm-1 offset-md-2">

                  <div class="row reorder-xs">

                    <div class="col-sm-12">
                      <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ellie/ellie-core@2x.jpg" />
                    </div>

                    <div class="col-sm-12">
                      <p><h4>On CORE</h4></p>
                      <p>
                        “I make it a priortiy to drink a lot of CORE water throughout the day. It’s pH balanced with electroytes and minerals so I know it’s working in harmony with my body while it hydrates me.”
                      </p>
                    </div>

                  </div>

                </div>

            </div>
          </div>

        </div>
      </div>
      <!-- END Music & CORE -->

    </div>


    <!-- Follow Ellie -->
    <div id="ellie_follow_bg">

      <div class="container">
        <div class="row">
          <div class="col-sm-10 offset-sm-1">
            <h2 style="color: white;">
                FOLLOW ELLIE GOULDING
            </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-10 offset-sm-1 text-center">
            <ul>
              <li>
                <a href="https://www.facebook.com/elliegoulding/" target="_blank" onclick="return trackOutboundLink('https://www.facebook.com/elliegoulding', true)"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="https://twitter.com/elliegoulding" target="_blank" onclick="return trackOutboundLink('https://twitter.com/elliegoulding', true)"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="https://www.instagram.com/elliegoulding/" target="_blank" onclick="return trackOutboundLink('https://www.instagram.com/elliegoulding/', true)"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="https://www.youtube.com/user/EllieGouldingVEVO" target="_blank" onclick="return trackOutboundLink('https://www.youtube.com/user/EllieGouldingVEVO', true)"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="https://open.spotify.com/artist/0X2BH1fck6amBIoJhDVmmJ" target="_blank" onclick="return trackOutboundLink('https://open.spotify.com/artist/0X2BH1fck6amBIoJhDVmmJ', true)"><i class="fa fa-spotify" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="https://soundcloud.com/elliegoulding" target="_blank" onclick="return trackOutboundLink('https://soundcloud.com/elliegoulding', true)"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>
              </li>
            </ul>
      
            
          </div>
        </div>

      </div>

    </section>

    <!-- END Follow Ellie -->
<?php endwhile; ?>

