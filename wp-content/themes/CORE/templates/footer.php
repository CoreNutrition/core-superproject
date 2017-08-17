<footer class="content-info">
  <div class="container">
  	<div class="row">
  		<div class="col-md-2">
  			<?php
    			$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			?>
  			<a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>"></a>
  		</div>
  		<div class="col-md-10 footer-main-nav">
  			<?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
            endif;
          ?>
  		</div>
  	</div>

  	<div class="row secondary">
    	<div class="col-md-12">
           <!--<form role="form" class="bot-form">
            	<input type="text" class="form-control" placeholder="Your email address...">
                <button class="btn btn-default">Sign  up!</button>
            </form>-->
        </div>
    </div>
    <div class="row">
       	<div class="col-md-7 copyright">
           	<?php //dynamic_sidebar('sidebar-footer'); ?>
           	<p>&copy; <?php echo date("Y"); ?> &#8212; <?php echo get_bloginfo("name"); ?> | <span style="color:#ccc"><em>*approximately 7.4 pH</em></span></p>
           </div>
        <div class="col-md-5 legal">
           	<nav class="nav-legal">
      		<?php
      			if (has_nav_menu('legal_navigation')) :
        			wp_nav_menu(['theme_location' => 'legal_navigation', 'menu_class' => 'nav']);
      			endif;
      		?>
    		</nav>
        </div>
    </div>


  </div>
</footer>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1897217020534667');
fbq('track', fb_trigger);
</script>

<noscript>
<img height="1" width="1" src="https://www.facebook.com/tr?id=1897217020534667&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!-- Amazon Pixel Code -->
<script type='text/javascript'>var _pix = document.getElementById('_pix_id_ab92c577-ea30-4ed0-1db5-2f0fdb42230b');if (!_pix) { var protocol = '//'; var a = Math.random() * 1000000000000000000; _pix = document.createElement('img'); _pix.style.display = 'none'; _pix.setAttribute('src', protocol + 's.amazon-adsystem.com/iu3?d=forester-did&ex-fargs=%3Fid%3Dab92c577-ea30-4ed0-1db5-2f0fdb42230b%26type%3D55%26m%3D1&ex-fch=416613&ex-src=core-hydration.com/&ex-hargs=v%3D1.0%3Bc%3D6035515370401%3Bp%3DAB92C577-EA30-4ED0-1DB5-2F0FDB42230B' + '&cb=' + a); _pix.setAttribute('id','_pix_id_ab92c577-ea30-4ed0-1db5-2f0fdb42230b'); document.body.appendChild(_pix);}</script><noscript> <img height='1' width='1' border='0' alt='' src='https://s.amazon-adsystem.com/iui3?d=forester-did&ex-fargs=%3Fid%3Dab92c577-ea30-4ed0-1db5-2f0fdb42230b%26type%3D55%26m%3D1&ex-fch=416613&ex-src=core-hydration.com/&ex-hargs=v%3D1.0%3Bc%3D6035515370401%3Bp%3DAB92C577-EA30-4ED0-1DB5-2F0FDB42230B' /></noscript>
<!-- End Amazon Pixel Code -->
