<?php
/*
Template name: Home Template
*/
get_header();
?>  
<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo bloginfo('template_url'); ?>/assets/images/computer-gaming_home.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        	<h3 class="v"><?php the_field( 'vertical_text_1' ); ?></h3>
        	<h3 class="vr"><?php the_field( 'vertical_text_2' ); ?></h3>
          <div class="col-md-11 ftco-animate text-center">
            <h1>  Osten</h1>
            <h2><span><?php the_field( 'content_after_title' );?></span></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="goto-here"></div>
    

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container"> 
				<div class="row">  

				<?php $photo_home_page = get_field( 'photo_home-page' ); ?>
<?php if ( $photo_home_page ) { ?>
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $photo_home_page['url']; ?>" alt="<?php echo $photo_home_page['alt']; ?>);">
					<?php } ?>

					
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-5 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Osten <br>Online <br> <span>Modern Shop</span></h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
				  
							<?php if ( have_rows( 'content_home-page' ) ) : ?>
					<?php while ( have_rows( 'content_home-page' ) ) : the_row(); ?>
						<p><?php the_sub_field( 'text-home-page' ); ?><p>
					<?php endwhile; ?>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>
						
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big"><?php the_field( 'products_block_title' ); ?></h1>
            <h2 class="mb-4"><?php the_field( 'products_block_description' ); ?></h2>
          </div>
        </div>    		
    	</div>


    	<div class="container-fluid">
    		<div class="row">
			<?php if ( have_rows( 'product' ) ) : ?>
	<?php while ( have_rows( 'product' ) ) : the_row(); ?>
		<?php $img_product = get_sub_field( 'img-product' ); ?>
		<?php if ( $img_product ) { ?>
			<div class="col-sm col-md-3 col-lg ftco-animate">
			<div class="product">
			<img class="img-fluid" src="<?php echo $img_product['url']; ?>" alt="<?php echo $img_product['alt']; ?>" />
		<?php } ?>
		<div class="text py-3 px-3">
		<h3><?php the_sub_field( 'description_product' ); ?></h3>
		<hr>
				</div>
    		</div>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
 		</div>
	</div> 
   </section> 

<?php

get_footer();
