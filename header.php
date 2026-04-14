<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no"/>
    <?php if(is_404()): ?>
        <meta name="robots" content="noindex, follow">
    <?php endif; ?>
        <meta name="description" content="<?php echo esc_attr( get_bloginfo('description') ); ?>"/>
        <meta name="robots" content="noindex, nofollow">
        <meta property="og:type" content="website">
        <meta property="og:title" content="明石でカウンセリング・療育・相談支援なら｜こころ相談研修センター">
        <meta property="og:description" content="発達支援・子育て・療育のご相談を専門家が丁寧にサポートします。まずはご相談から。">
        <meta property="og:url" content="https://lp.cocotoko.com/">
        <meta property="og:site_name" content="こころ相談研修センター">
        <meta property="og:locale" content="ja_JP">
        <meta property="og:image" content="https://lp.cocotoko.com/assets/images/ogp.jpg">
        <!-- X (Twitter) -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="明石でカウンセリング・療育・相談支援なら｜こころ相談研修センター">
        <meta name="twitter:description" content="発達支援・子育て・療育のご相談を専門家が丁寧にサポートします。まずはご相談から。">
        <meta name="twitter:image" content="https://lp.cocotoko.com/assets/img/ogp.jpg">
    <?php wp_head(); ?>
</head>
<body id="<?php echo get_post_field('post_name', get_the_ID()); ?>" <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link" href="#main">本文へスキップ</a>
    <header class="header secondary-header">
        <div class="container">
            <div class="logo-wrap">
                <a href="https://cocotoko.com/" class="logo"  target="_blank" rel="noopener">
                    <span>明石の児童発達支援・療育</span>
                    <span>こころ相談研修センター<span class="sr-only">（新しいタブで開きます）</span></span>
                </a>
            </div>
            <div class="inner">
                <nav class="pc-nav">
                <?php wp_nav_menu( array ( 
                    'theme_location' => 'secondary-menu',
                    'menu_class' => 'pc-menu',
                    'container' => false,
                    )); 
                ?>
                </nav>
                <?php get_search_form(); ?>
            </div>
        </div>
        <button class="hamburger-btn js-hamburger-btn" type="button" aria-controls="sp-menu" aria-expanded="false" aria-label="メニューを開く">
            <div class="btn-area js-btn-area">
                <span></span><span></span><span></span>
            </div>
        </button>
        <div class="mask js-mask" id="sp-menu" hidden>
            <a href="https://cocotoko.com/" class="logo"  target="_blank" rel="noopener" aria-label="公式ホームページ（新しいタブで開きます）">
                <span>明石の児童発達支援・療育</span>
                <span>こころ相談研修センター</span>
            </a>
            <div class="wrap">
                <nav class="sp-nav" aria-label="SNSリンク">
                <?php wp_nav_menu( array ( 
                    'theme_location' => 'secondary-menu',
                    'menu_class' => 'sp-menu',
                    'container' => false,
                    )); 
                ?>
                </nav>
            </div>
        </div>
    </header>
    <?php if(function_exists('bcn_display')): ?>
        <nav class="breadCrumb" typeof="BreadcrumbList" aria-label="現在のページ">
            <div class="container">
            <?php bcn_display(); ?>
            </div>
        </nav>
    <?php endif; ?>