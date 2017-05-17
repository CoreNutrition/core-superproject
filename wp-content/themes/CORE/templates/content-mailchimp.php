<!-- Begin MailChimp Signup Form -->
<div class="mailchimp content-item grid-item half">
  <script>
    function validateForm() {
      var email = document.forms["mc-embedded-subscribe-form"]["EMAIL"].value;
      if (email == "Email Address") {
        //document.forms["mc-embedded-subscribe-form"]["FNAME"].disabled = true;
        document.forms["mc-embedded-subscribe-form"]["EMAIL"].value = "";
      }
    }
  </script>

  <div id="mc_embed_signup">
    <form action="//core-hydration.us12.list-manage.com/subscribe/post?u=<?php echo $mailchimp_user_id; ?>&amp;id=<?php echo $mailchimp_list_id; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate onsubmit="return validateForm();">
        <div id="mc_embed_signup_scroll">
          <h3><?php echo $signup_title; ?></h3>
          <div class="mc-field-group">
          <!--  <label for="mce-EMAIL">Email Address </label> -->
          <div class="row mailchimp-form-fields">
            <div class="col-md-7 col-lg-8 inputs">
              <input type="email" value="Email address" name="EMAIL" class="required email" id="mce-EMAIL" onfocus="if (this.value=='<?php _e("Email address","sage"); ?>') this.value = ''" onblur="if (this.value=='') this.value = '<?php _e("Email address","sage"); ?>'">
            </div>
            <div class="col-md-5 col-lg-4 submit">
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_<?php echo $mailchimp_user_id; ?>_<?php echo $mailchimp_list_id; ?>" tabindex="-1" value=""></div>
              <input type="submit" value="<?php _e("Sign up!","sage"); ?>" name="subscribe" id="mc-embedded-subscribe" class="black-btn">
            </div>
          </div>
          <div id="mce-responses">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div> 
        </div>
      </div>
    </form>
  </div>

  <!-- lifestyle images -->
  <?php if( $email_images ):
      //start the row
      echo "<div class='row mailchimp-lifestyle-images'>";
      foreach( $email_images as $email_image ): 
        echo "<div class='col-md-4 col-6'>";
                    
          if ($email_images_url) {
            echo "<a href='".$email_images_url."' target='_blank'>";
          }
          echo "<img src='".$email_image['sizes']['square']."' alt='".$email_image['alt']."' />";
          if ($email_images_url) {
            echo "</a>";
          }
        echo "</div>";
      endforeach; 
      echo "</div>";
      endif;
  ?>
              

  <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
</div>
<!--End mc_embed_signup-->
