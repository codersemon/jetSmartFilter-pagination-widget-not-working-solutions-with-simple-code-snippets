<?php 
// Load More Products Shortcode
function load_more_products_shortcode() {
    global $wp_query;

    // Check if WooCommerce is active
    if ( class_exists( 'WooCommerce' ) ) {
        ob_start();

        $max_pages = $wp_query->max_num_pages;
        $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

        if ( $max_pages > 1 && $paged < $max_pages ) {
            echo '<div class="load-more-wrapper"><a href="' . esc_url( get_next_posts_page_link() ) . '" class="button load-more">' . __( 'Load More', 'your-text-domain' ) . '</a></div>';
        } // update "Load more" words with your desired word

        return ob_get_clean();
    }
}
add_shortcode( 'load_more_products', 'load_more_products_shortcode' );
