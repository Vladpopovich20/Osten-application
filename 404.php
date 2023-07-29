<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package osten
 */

get_header();
?>
<section class="error-404">
<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
				<!-- <img src="" alt=""> -->
                <span class="display-1 d-block error-404__title">404</span>
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'osten' ); ?></h1>
                <div class="mb-4 lead"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below', 'osten' ); ?></div>
                <a class="nav-link" href="<?php echo get_home_url(); ?>">Back to home</a>
            </div>
        </div>
    </div>
</div>

</section>

<?php
get_footer();




