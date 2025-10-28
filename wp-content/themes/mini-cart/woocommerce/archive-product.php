<?php
/**
 * Custom WooCommerce Shop Template with AJAX Auto Filters (Category + Price)
 */
defined('ABSPATH') || exit;

get_header('shop'); ?>

<main class="shop-page container py-5">

    <h1 class="mb-4 text-center fw-bold"><?php woocommerce_page_title(); ?></h1>

    <!-- 🧭 Filters Section -->
    <div class="shop-filter mb-5 text-center">
        <form id="product-filters" class="row justify-content-center g-3">

            <!-- Category Filter -->
            <div class="col-md-4">
                <select name="product_cat" id="product_cat" class="form-select">
                    <option value="">All Categories</option>
                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                    ]);

                    foreach ($terms as $term) {
                        echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Price Sort Filter -->
            <div class="col-md-4">
                <select name="sort" id="sort" class="form-select">
                    <option value="">Default Sorting</option>
                    <option value="low">Price: Low to High</option>
                    <option value="high">Price: High to Low</option>
                </select>
            </div>

            <!-- Reset Button -->
            <div class="col-md-2">
                <button type="button" id="reset-filters" class="btn btn-outline-secondary w-100">
                    Reset
                </button>
            </div>

        </form>
    </div>

    <!-- 🛒 Product List -->
    <div id="product-results" class="row g-4 justify-content-center">
        <?php
        // Default WooCommerce Loop
        if (woocommerce_product_loop()) {
            woocommerce_product_loop_start();

            while (have_posts()):
                the_post();
                wc_get_template_part('content', 'product');
            endwhile;

            woocommerce_product_loop_end();
        } else {
            echo '<p class="text-center">No products found.</p>';
        }
        ?>
    </div>

</main>

<?php get_footer('shop'); ?>