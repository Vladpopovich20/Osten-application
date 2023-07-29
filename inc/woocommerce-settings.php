<?php 
//Провірка чи встановлений woocommerce плагін
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 

    //  ====== хук Woocommerce необхідний підключення ========= //
function osten_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'osten_add_woocommerce_support' );

// відключити хлібні крошки

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);



// Персоналізація хлібні крошки
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
    // Change the breadcrumb delimeter from '/' to '>'
    $defaults['delimiter'] = ' &nbsp; ';
    $defaults['wrap_before'] = '<p class="breadcrumbs"><span>';
    $defaults['wrap_after']  = '</span></p>';
    return $defaults;
}


//Sales беруть дві ціни і вираховується процент для товара

add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {

  if( $product->is_type('variable')){
      $percentages = array();

      // Get all variation prices
      $prices = $product->get_variation_prices();

      // Loop through variation prices
      foreach( $prices['price'] as $key => $price ){
          // Only on sale variations
          if( $prices['regular_price'][$key] !== $price ){
              // Calculate and set in the array the percentage for each variation on sale
              $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } elseif( $product->is_type('grouped') ){
      $percentages = array();

      // Get all variation prices
      $children_ids = $product->get_children();

      // Loop through variation prices
      foreach( $children_ids as $child_id ){
          $child_product = wc_get_product($child_id);

          $regular_price = (float) $child_product->get_regular_price();
          $sale_price    = (float) $child_product->get_sale_price();

          if ( $sale_price != 0 || ! empty($sale_price) ) {
              // Calculate and set in the array the percentage for each child on sale
              $percentages[] = round(100 - ($sale_price / $regular_price * 100));
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } else {
      $regular_price = (float) $product->get_regular_price();
      $sale_price    = (float) $product->get_sale_price();

      if ( $sale_price != 0 || ! empty($sale_price) ) {
          $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
      } else {
          return $html;
      }
  }
  return '<span class="status">'. $percentage . '</span>'; //добавлення свого класу для акції
}



// відключаємо вверх

//remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20); //   {показ скільки товару}

//remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30); // {показ сортування}


/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
    //Відключаємо Sidebar
    // remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );

   
  /**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
     // Продукт контент
    remove_action( 'woocommerce_before_shop_loop_item',' woocommerce_template_loop_product_link_open',10 );    
	remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5 );



    //Зображення
	add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_open',5 );
    add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',15 );
    
   // Продукт дата видалення заголовка
   remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10 );

function my_custom_title(){ //функція для введення своїх даних в продукті заголовок та силка
echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

}

add_action( 'woocommerce_shop_loop_item_title','my_custom_title',15 ); //виклик своєї функції для хука




    //Single image сторінка зум і зближування
    add_action( 'after_setup_theme', 'ale_woocommerse_plugin_setup' );

    function ale_woocommerse_plugin_setup() {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' ); //слайдер для мого товару 
    }





    /**
     * Hook: woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */
  



  // Single Product Right part  Заголовок
 function osten_single_title(){
    echo '<h3>'.get_the_title().'</h3>';
}
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_title',5 );
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_rating',10 );
add_action( 'woocommerce_single_product_summary','osten_single_title',5 );

remove_action( 'woocommerce_single_variation','woocommerce_single_variation', 10 );
add_action( 'woocommerce_before_variations_form','woocommerce_single_variation', 11 );
//remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_meta',40 ); // продукт мета

// Три останні коменти закоментувати якщо треба опис і інші вкладки
// remove_action( 'woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10 );
// remove_action( 'woocommerce_after_single_product_summary','woocommerce_upsell_display',15 );
// remove_action( 'woocommerce_after_single_product_summary','woocommerce_output_related_products',20 );
// - кінець
// remove_action( 'woocommerce_single_variation','woocommerce_single_variation',10 );

add_action( 'woocommerce_before_variations_form','woocommerce_single_variation',11 );


remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products', 20); //releated product не показує рекомендовані товари



// Cart 

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

add_action( 'woocommerce_after_cart','woocommerce_cross_sell_display' );




add_filter( 'woocommerce_cross_sells_columns', 'osten_change_cross_sells_columns' );
// вивід в 4 колонки
function osten_change_cross_sells_columns( $columns ) {
    return 4;
}



  //Disable Select2
  function woo_dequeue_select2() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'select2' );
        wp_deregister_style( 'select2' );

        wp_dequeue_script( 'selectWoo');
        wp_deregister_script('selectWoo');
    } 
}
add_action( 'wp_enqueue_scripts', 'woo_dequeue_select2', 100 );



remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); // відключення купона
























}