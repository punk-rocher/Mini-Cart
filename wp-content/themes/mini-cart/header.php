<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container">
        <!-- Site Logo / Title -->
        <a class="navbar-brand fw-bold text-primary" href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                'fallback_cb'    => '__return_false',
                'depth'          => 2,
                'walker'         => new WP_Bootstrap_Navwalker(), // optional, if you add the navwalker class
            ]);
            ?>

            <!-- Search Form -->
            <form role="search" method="get" class="d-flex ms-lg-3 mt-3 mt-lg-0" action="<?php echo esc_url(home_url('/')); ?>">
                <input class="form-control me-2" type="search" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</header>

<main id="content" class="site-content">
