<?php

/**
 * Template Name: Home
 * 
 * Created on : 28/10/2025
 * @author    : Ravindu Fernando
 */

get_header(); ?>

<main class="home-page">

    <!-- Section 1: Hero / Banner -->
    <section class="hero-section bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Welcome to Our Store</h1>
            <p class="lead mb-4">Discover amazing products and exclusive deals just for you.</p>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-light btn-lg">Shop
                Now</a>
        </div>
    </section>

    <!-- Section 2: Featured Products -->
    <section class="featured-products py-5">
        <div class="container">
            <h2 class="text-center mb-5">Featured Products</h2>
            <div class="row g-4 justify-content-center">

                <?php
                // WP Query for 4 featured products
                $args = [
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'meta_query' => [
                        [
                            'key' => '_featured',
                            'value' => 'yes'
                        ]
                    ]
                ];
                $loop = new WP_Query($args);

                if ($loop->have_posts()) {
                    while ($loop->have_posts()):
                        $loop->the_post();
                        ?>
                        <div class="col-sm-6 col-md-3">
                            <div class="card h-100 text-center shadow-sm">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    <?php endif; ?>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php echo wc_price(get_post_meta(get_the_ID(), '_price', true)); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">View Product</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                } else {
                    echo '<p class="text-center">No featured products found.</p>';
                }
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>