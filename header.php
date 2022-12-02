<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <header id="masthead" class="site-header navbar-static-top" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl navbar-dark px-0">
                <div class="navbar-brand">
                    <a href="/" rel="home">
                        <?php the_custom_logo();?>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'top-menu',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'echo'            => true,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 1,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
            </nav>
        </div>
    </header><!-- #masthead -->