<?php
defined('ABSPATH') || exit;
get_header('shop'); ?>

<div class="container my-5">
    <?php while (have_posts()):
        the_post();
        global $product; ?>
        <div class="row g-5 align-items-start">
            <!-- Images -->
            <div class="col-12 col-md-6">
                <div class="product-gallery">
                    <?php woocommerce_show_product_images(); ?>
                </div>
            </div>

            <!-- Summary -->
            <div class="col-12 col-md-6">
                <h1 class="h3 mb-2"><?php the_title(); ?></h1>

                <div class="mb-3">
                    <span class="h4 text-primary"><?php echo $product->get_price_html(); ?></span>
                </div>

                <div class="mb-3">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>


                <!-- ACF custom fields output -->
                <?php
                if (function_exists('get_field')) {
                    $material = get_field('product_material', $product->get_id());
                    $shipping_note = get_field('shipping_note', $product->get_id());

                    if ($material || $shipping_note) {
                        echo '<div class="product-meta mb-4">';
                        if ($material) {
                            echo '<p><strong>Material:</strong> <span class="text-muted ms-2">' . esc_html($material) . '</span></p>';
                        }
                        if ($shipping_note) {
                            echo '<p><strong>Shipping Note:</strong> <span class="text-muted ms-2">' . esc_html($shipping_note) . '</span></p>';
                        }
                        echo '</div>';
                    }
                }
                ?>


                <!-- Full description below -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card p-4">
                            <h3 class="h5">Product details</h3>
                            <div class="mt-3">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Additional details or tabs -->
            <div class="product-details">
                <?php 
                    woocommerce_output_product_data_tabs();
                    ?>
            </div>
        </div>



    <?php endwhile; ?>
</div>

<?php get_footer('shop'); ?>