<?php
/*
Template name: About Template
*/
get_header();
?>

<div class="hero-wrap hero-bread" style="background-image: url('<?php echo bloginfo('template_url') ?>/assets/images/cart.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
			<h1 class="mb-0 bread"><?php the_title(); ?></h1>
		   <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {  woocommerce_breadcrumb();} ?>
			</div>
		</div>
	</div>
</div>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
<?php $photo_about_page = get_field( 'photo_about-page' ); ?>
<?php if ( $photo_about_page ) { ?>
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $photo_about_page['url']; ?>" alt="<?php echo $photo_about_page['alt']; ?>">
					<?php } ?>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-5 mt-md-5">
	          	<div class="ml-md-0">
              <h2 class="mb-4">Osten <br>Online <br> <span>Modern Shop</span></h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
            <?php if ( have_rows( 'content_about-page' ) ) : ?>
	<?php while ( have_rows( 'content_about-page' ) ) : the_row(); ?>
		<p><?php the_sub_field( 'text-about-page' ); ?></p>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

<section class="ftco-section bg-light ftco-services">
<div class="container">
  <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
      <h1 class="big"><?php the_field( 'services_main_title' ); ?></h1>
      <h2><?php the_field( 'services_main_description' ); ?></h2>
    </div>
  </div>

  <div class="row">
          <?php if ( have_rows( 'content_services' ) ) : ?>
          <?php while ( have_rows( 'content_services' ) ) : the_row(); ?>
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
          <div class=" d-flex justify-content-center align-items-center mb-4">
          <span class="flaticon-002-recommended"></span>
          </div>
          <div class="media-body">
          <h3 class="heading">	<?php the_sub_field( 'services-title' ); ?></h3>
          <p> 		<?php the_sub_field( 'services-content' ); ?></p>
  </div>
  </div>      
  </div>
          <?php endwhile; ?>
          <?php else : ?>
          <?php // no rows found ?>
          <?php endif; ?>

    </div> 
  </div>
</div>
</section>

<?php
get_footer();