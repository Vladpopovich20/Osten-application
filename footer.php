
<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h6 class="big"><?php the_field( 'form_block_title', 'option' ); ?></h6>
              <h2><?php the_field( 'form_block_description', 'option' ); ?></h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">   
              <form method="POST"  class="subscribe-form customizes-form">
                    <?php echo do_shortcode('[contact-form-7 id="345" title="Response"]'); ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?php echo bloginfo('name'); ?></h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="<?php the_field( 'instagram','options' ); ?>"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="<?php the_field( 'telegram','options' ); ?>"><span class="icon-telegram"></span></a></li>
                <li class="ftco-animate"><a href="<?php the_field( 'facebook','options' ); ?>"><span class="icon-facebook"></span></a></li>
       
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                         <!-- меню 1 -->
              <?php   wp_nav_menu(array(
                  'theme_location'   => 'bottom',
                  'container'        =>  null,
                   'menu_class'      => 'list-unstyled'
                )); ?>
                        <!-- меню 1 -->
              </ul>
            </div>
          </div>
          
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">

                                  <!-- меню 2 -->
                <?php   wp_nav_menu(array(
                  'theme_location'   => 'bottom_two',
                  'container'        =>  null,
                   'menu_class'      => 'list-unstyled mr-l-5 pr-l-3 mr-4'
                )); ?>
                                  <!-- меню 2 -->
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php the_field( 'adress','options' ); ?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">	<?php the_field( 'phone','options' ); ?></span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php the_field( 'email','options' ); ?></span></a></li>
                <li><?php echo do_shortcode('[gtranslate]'); ?></li>

	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p><?php the_field( 'copyright_word', 'option' );?> &copy;<script>document.write(new Date().getFullYear());</script> <?php the_field( 'copyright_text', 'option' ); ?></a></p>
          </div>
        </div>
      </div>
    </footer>
    
<?php wp_footer(); ?>
</body>
</html>
