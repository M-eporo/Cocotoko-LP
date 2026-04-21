<?php
    function theme_setup() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form'));
        add_image_size('single-thumb', 800, 500, true);
        //register_nav_menu('main-menu', 'メインメニュー');
        register_nav_menus(array(
            'secondary-menu' => 'セカンダリーメニュー',
            'footer-menu' => 'フッターメニュー'
        ));
    }
    add_action('after_setup_theme', 'theme_setup');

    add_filter('document_title_parts', function ($title) {
        unset($title['tagline']);
        return $title;
    });

    add_filter('pre_get_document_title', function($title) {
        if(is_404()) {
            return 'ページが見つかりません | こころ相談研修センター';
        }
        return $title;
    });

    function enqueue_scripts() {
        //splide.js
        wp_enqueue_script( 
            'splide_min_vendor',
            get_template_directory_uri() . '/assets/js/splide.min.js',
            array(),
            '4.1.2', 
            true
        );
        //splide setting
        wp_enqueue_script( 
            'splide_custom',
            get_template_directory_uri() . '/assets/js/splide.js',
            array('splide_min_vendor'),
            '1.0.0', 
            true
        );
        //FAQアコーディオン
        wp_enqueue_script( 
            'faq-accordion',
            get_template_directory_uri() . '/assets/js/accordion.js',
            array(),
            '1.0.0', 
            true
        );
        //ハンバーガーボタン
        wp_enqueue_script( 
            'hamburger_button',
            get_template_directory_uri() . '/assets/js/hamburger.js',
            array(),
            '1.0.0', 
            true
        );
        //GSAP-core
        wp_enqueue_script(
            'gsap-core',
            'https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/gsap.min.js',
            array(),
            '3.14.1',
            true
        );
        //GSAP-ScrollTrigger
        wp_enqueue_script(
            'gsap-scrollTrigger',
            'https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/ScrollTrigger.min.js',
            array('gsap-core'),
            '3.14.1',
            true
        );
        //GSAP-MotionPath
        wp_enqueue_script(
            'gsap-motionPath',
            'https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/MotionPathPlugin.min.js',
            array('gsap-core', 'gsap-scrollTrigger'),
            '3.14.1',
            true
        );
        //GSAP-thema
        wp_enqueue_script(
            'gsap-thema',
            get_template_directory_uri() . '/assets/js/gsap-core.js',
            array('gsap-core', 'gsap-scrollTrigger', 'gsap-motionPath'),
            '1.0.0',
            true
        );
        wp_enqueue_script(
            'p5',
            'https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.9.0/p5.js',
            array(),
            '1.9.0',
            true
        );
        wp_enqueue_script(
            'p5-confetti',
            get_template_directory_uri() . '/assets/js/confetti.js',
            array('p5'),
            '1.0.0',
            true
        );
        // reset.css
        wp_enqueue_style(
            'cocotoko-reset',
            get_template_directory_uri() . '/assets/css/vendors/reset.css',
            array(),
            '1.0'
        );

        // splide.css
        wp_enqueue_style(
            'cocotoko-splide',
            get_template_directory_uri() . '/assets/css/vendors/splide.min.css',
            array('cocotoko-reset'),
            '4.1.4'
        );

        // Font Awesome（CDN）
        wp_enqueue_style(
            'font-awesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
            array(),
            '6.5.0'
        );

        // Google Fonts
        wp_enqueue_style(
            'google-fonts',
            'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Mochiy+Pop+One&family=Noto+Sans+JP:wght@100..900&family=Rampart+One&family=Roboto:ital,wght@0,100..900;1,100..900&family=RocknRoll+One&display=swap',
            array(),
            null
        );

        // メインCSS
        wp_enqueue_style(
            'cocotoko-style',
            get_template_directory_uri() . '/assets/css/style.css',
            array(
            'cocotoko-reset',
            'cocotoko-splide',
            'font-awesome',
            'google-fonts'
            ),
            '1.0'
        );
    }
    add_action('wp_enqueue_scripts', 'enqueue_scripts');

    add_filter('wp_resource_hints', function ($urls, $relation_type) {
        if ($relation_type === 'preconnect') {
            $urls[] = [
            'href' => 'https://fonts.googleapis.com',
            ];
            $urls[] = [
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
            ];
        }
        return $urls;
    }, 10, 2);

    // 404ページで不要なスクリプトとスタイルを解除
    add_action('wp_enqueue_scripts', function() {
        if( is_404()) {
            wp_dequeue_script('splide_min_vendor');
            wp_dequeue_script('splide_custom');
            wp_dequeue_script('faq-accordion');
            wp_dequeue_style('cocotoko-splide');
            wp_dequeue_style('font-awesome');
        }
    });

    // page('news')と投稿ページで不要なスクリプトとスタイルを解除
    add_action('wp_enqueue_scripts', function() {
        if(is_page('news') || is_single() || is_search()) {
            wp_dequeue_script('splide_min_vendor');
            wp_dequeue_script('splide_custom');
            wp_dequeue_script('faq-accordion');
            wp_dequeue_script('gsap-core');
            wp_dequeue_script('gsap-scrollTrigger');
            wp_dequeue_script('gsap-motionPath');
            wp_dequeue_script('gsap-thema');
            wp_dequeue_style('cocotoko-splide');
            wp_dequeue_style('font-awesome');
        }
    });
    // ウィジェットエリアの追加
    
    function theme_widgets_init() {
        register_sidebar(
            array(
                'name' => 'サイドバー',
                'id' => 'sidebar-widget-area',
                'description' => 'サイドバーに表示されるウィジェットエリアです。',
                'before_widget' => '<div id="%1$s" class="widget">',
                'after_widget' => '</div>',
            )
        );
        register_sidebars(
            3,
            array(
                'name' => 'フッター %d',
                'id' => 'footer-widget-area',
                'description' => 'フッターのサイドバー',
                'before_widget' => '<div id="%1$s" class="%2$s">',
                'after_widget' => '</div>'
            )
        );
    }
    add_action('widgets_init', 'theme_widgets_init');

    // ブロックエディターの設定
    function theme_block_setup() {
        add_theme_support('wp-block-styles');
        add_theme_support('responsive-embeds');
        add_theme_support('align-wide');
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name' => '固定ボタンカラー',
                    'slug' => 'fixed-btn',
                    'color' => '#9CC4FF'
                ),
                array(
                    'name' => 'ブルー',
                    'slug' => 'blue',
                    'color' => '#2379E3'
                ),
            
                array(
                    'name' => 'ヘッダーカラー',
                    'slug' => 'header-color',
                    'color' => '#2AA8C3'
                ),
            
                array(
                    'name' => 'ロゴサブカラー',
                    'slug' => 'logo-sub',
                    'color' => '#90A4AE'
                ),
            
                array(
                    'name' => '緑',
                    'slug' => 'green',
                    'color' => '#55DD96'
                ),
                array(
                    'name' => '深緑',
                    'slug' => 'deep-green',
                    'color' => '#5d9f66'
                ),
                array(
                    'name' => 'オレンジ',
                    'slug' => 'orange',
                    'color' => '#FF8719'
                ),
                array(
                    'name' => 'レッド',
                    'slug' => 'red',
                    'color' => '#ff6b6b'
                ),
                array(
                    'name' => 'イエロー',
                    'slug' => 'yellow',
                    'color' => '#fdef2e'
                ),
                array(
                    'name' => 'パープル',
                    'slug' => 'purple',
                    'color' => '#ECAEFF'
                ),
                array(
                    'name' => 'ダークグレー',
                    'slug' => 'dk-gray',
                    'color' => '#555'
                ),
                array(
                    'name' => 'チャコール',
                    'slug' => 'chacoal',
                    'color' => '#333'
                ),
                array(
                    'name' => 'ホワイト',
                    'slug' => 'white',
                    'color' => '#fff'
                ),
                array(
                    'name' => 'アイボリー',
                    'slug' => 'ivory',
                    'color' => '#eee'
                ),
            )
        );
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name' => '極小',
                    'size' => '14',
                    'slug' => 'x-small',
                ),
                array(
                    'name' => '小',
                    'size' => '16',
                    'slug' => 'small',
                ),
                array(
                    'name' => '標準',
                    'size' => '18',
                    'slug' => 'normal',
                ),
                array(
                    'name' => '大',
                    'size' => '44',
                    'slug' => 'large',
                ),
                array(
                    'name' => '特大',
                    'size' => '36',
                    'slug' => 'huge',
                ),
            )
        );
        add_theme_support('editor-styles');
        add_editor_style('assets/css/editor-styles.css');
        add_editor_style('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Mochiy+Pop+One&family=Noto+Sans+JP:wght@100..900&family=Rampart+One&family=Roboto:ital,wght@0,100..900;1,100..900&family=RocknRoll+One&display=swap');
    }
    add_action('after_setup_theme', 'theme_block_setup');

    // ブロックに自作スタイルを追加する
    function block_style_setup() {
        register_block_style(
            'core/button',
            array(
                'name' => 'arrow',
                'label' => '矢印付き'
            )
        );
        register_block_style(
            'core/button',
            array(
                'name' => 'fixed',
                'label' => '幅固定'
            )
        );
    }
    add_action('after_setup_theme', 'block_style_setup');
    
    // 既存のブロックパターンをすべて
    // 削除する
    function remove_block_patterns() {
        remove_theme_support('core-block-patters');
    }
    add_action('after_setup_theme', 'remove_block_patterns');
    // 特定のブロックパターンを削除する
    function remove_block_pattern() {
        unregister_block_pattern('core/social-lionks-shared-background-color');
    }
    add_action('init', 'remove_block_pattern');

    // 独自のブロックパターンを追加する
    function register_block_patterns() {
        register_block_pattern(
            'cocoro/campaign',
            array(
                'title' => 'キャンペーン内容',
                'categories' => array('text'),
                'description' => 'キャンペーン用のブロックパターン',
                'content' => "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">キャンペーン内容</h2>\n<!-- /wp:heading -->\n\n<!-- wp:table -->\n<figure class=\"wp-block-table\"><table class=\"as-fixed-layout\"><tbody><tr><td>対象日</td><td>キャンペーン期間中、雨が降っていたお客様</td></tr><tr><td>期間</td><td>2026年6月1日 ～ 2026年7月7日</td></tr><tr><td>内容</td><td>施術料金の合計金額から15% OFF</td></tr></tbody></table></figure>\n<!-- /wp:table -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\">\n<!-- wp:button {\"className\":\"is-style-arrow\"} -->\n<div class=\"wp-block-button is-style-arrow\">\n<a class=\"wp-block-button__link wp-element-button\">ご予約はこちら</a>\n</div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
                'viewportWidth' => '768',
            )
        );
    }
    add_action('init', 'register_block_patterns');

    add_filter('snow_monkey_forms_validate', function($errors, $form_id, $input) {

  if ((string)$form_id !== '18') return $errors;

  if (isset($input['email'], $input['email-check']) && $input['email'] !== $input['email-check']) {
    $errors['email-check'] = 'メールアドレスが一致しません。';
  }

  if (isset($input['privacy-agree']) && empty($input['privacy-agree'])) {
    $errors['privacy-agree'] = 'プライバシーポリシーへの同意が必要です。';
  }

  if (isset($input['tel']) && $input['tel'] !== '' && !preg_match('/^[0-9\-]+$/', $input['tel'])) {
    $errors['tel'] = '電話番号の形式が正しくありません。';
  }

  return $errors;
}, 10, 3);
    // // Snow Monkey Formsのメールアドレス確認用カスタムバリデーション
    // add_filter(
    //     'snow_monkey_forms_validate',
    //     function($errors, $form_id, $input) {
    //         if($input['email'] !== $input['email-check']) {
    //             $errors['email-check'] = 'メールアドレスが一致しません。';
    //         }
    //         return $errors;
    //     },
    //     10,3
    // );

    // // Snow Monkey Formsのプライバシーポリシーの同意用カスタムバリデーション
    // add_filter(
    //     'snow_monkey_forms_validate',
    //     function($errors, $form_id, $input) {
    //         if(empty($input['privacy-agree'])) {
    //             $errors['privacy-agree'] = 'プライバシーポリシーへの同意が必要です。';
    //         }
    //         return $errors;
    //     },
    //     10,3
    // );

    // // Snow Monkey Formsの電話番号の形式確認用カスタムバリデーション
    // add_filter(
    //     'snow_monkey_forms_validate',
    //     function($errors, $form_id, $input) {
    //         if ( ! preg_match('/^[0-9\-]+$/', $input['tel']) ) {
    //             $errors['tel'] = '電話番号の形式が正しくありません。';
    //         }

    //         return $errors;
    //     },
    //     10,3
    // );