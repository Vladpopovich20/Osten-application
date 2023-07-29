<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package osten
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

            <?php   wp_nav_menu(array(
                  'theme_location'   => 'top',
                  'container'        =>  null,
                   'menu_class'      => 'navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2'
                )); ?>

<!-- корзина -->
<?php if (class_exists('WooCommerce' )){
global $woocommerce; ?>
              <li class="nav-item cta cta-colored"><a href="<?php echo $woocommerce->cart->get_cart_url()?>" class="nav-link"><span class="icon-shopping_cart"></span><?php echo WC()->cart->get_cart_contents_count(); ?></a></li>

              <?php }?>
         
            </ul>
          </div>
        </div>
      </nav>


 



    