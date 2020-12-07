<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF"/>
    <meta name="msapplication-TileImage" content="mstile-144x144.png"/>
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png"/>
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png"/>
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png"/>
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/safari-pinned-tab.svg" color="#623b29">

    <meta name="msapplication-TileColor" content="#623b29">
    <meta name="theme-color" content="#ffffff">


    <meta property="og:site_name" content="Virtu">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta property="og:title" content="Virtu - odkryj niepowtarzalny smak dań"/>
    <meta property="og:description"
          content="Virtu - odkryj niepowtarzalny smak dań!"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://www.virtu.pl/"/>
    <meta property="og:locale" content="pl_PL">


    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?> id="scroll-top">

<!-- header -->
<header class="header clear desktop-menu" role="banner">

    <!-- nav -->
        <nav class="nav" role="navigation">
            <a href="<?php echo home_url(); ?>"><img class="lazy lazy-loading nav__logo" data-src="<?php echo get_template_directory_uri(); ?>/img/menu/logo.png" alt=""></a>
            <div class="nav__menu">
                <a class="home-icon-a" href="<?php echo home_url(); ?>">
                    <img class="lazy lazy-loading nav_homepage" data-src="<?php echo get_template_directory_uri(); ?>/img/menu/home-icon.svg" alt="">
                </a>
                 <?php html5blank_nav(); ?>
                 <a class="home-icon-a" href="<?php echo home_url(); ?>">
                   <img class="lazy lazy-loading search-icon" data-src="<?php echo get_template_directory_uri(); ?>/img/menu/search.svg" alt="">
                 </a>
                 <a class="home-icon-a" href="/projekty-ue/">
                   <img class="lazy lazy-loading eu-icon" data-src="<?php echo get_template_directory_uri(); ?>/img/menu/ue-copy.jpg" alt="">
                 </a>
            </div>
        </nav>
        <!-- /nav -->
</header>


<header class="header clear mobile-menu" role="banner">

<!-- nav -->
<nav class="top-nav" id="top-nav">
<a href="<?php echo home_url(); ?>"><img class="lazy lazy-loading nav__logo" data-src="<?php echo get_template_directory_uri(); ?>/img/menu/logo.png" alt=""></a>
    <div class="icons-menu">
        <a class="home-icon-a" href="/projekty-ue/">
            <img class="lazy lazy-loading eu-icon" data-src="<?php echo get_template_directory_uri(); ?>/img/menu/ue-copy.jpg" alt="">
        </a>
        <a class="home-icon-a" href="<?php echo home_url(); ?>">
            <img class="lazy lazy-loading search-icon" data-src="<?php echo get_template_directory_uri(); ?>/img/menu/search-dark.svg" alt="">
        </a>
    </div>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <?php html5blank_nav_mobile(); ?>
 </nav>
</header>
