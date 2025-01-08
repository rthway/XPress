<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <div class="top-bar">
            <div class="container">
                <div class="date-time">
                    <?php echo date_i18n('l, F j, Y'); // Displays the current date dynamically. ?>
                </div>
                <div class="social-menu">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'social-menu',
                        'container'      => '',
                        'menu_class'     => 'social-links',
                    )); ?>
                </div>
            </div>
        </div>

        <div class="header-main container">
            <div class="logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <h1><?php bloginfo('name'); ?></h1>
                    </a>
                <?php endif; ?>
            </div>
            <div class="header-ad">
                <?php if (is_active_sidebar('header-ad')) : ?>
                    <?php dynamic_sidebar('header-ad'); ?>
                <?php endif; ?>
            </div>
        </div>

        <nav class="main-navigation">
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => '',
                'menu_class'     => 'main-menu',
            )); ?>
        </nav>
    </header>
