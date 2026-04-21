<?php get_header(); ?>
    <main class="main single supports">
        <div class="container">
        <?php if(have_posts()): ?>
        <?php
        while(have_posts()):
            the_post();
        ?>
            <div class="post-content">
                <article id="<?php the_ID(); ?>" <?php post_class(); ?>>
                    <span class="category-name">発達支援サービス</span>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="content-meta">
                        <span><?php echo get_the_date(); ?></span>
                        <span><?php the_terms(get_the_ID(), 'supports-method'); ?></span>
                    </div>
                    <div class="content-body">
                        <?php if(has_post_thumbnail()): ?>
                        <div class="content-eyecatch">
                            <?php the_post_thumbnail('single-thumb'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="content-text"><?php the_content(); ?></div>
                    </div>
                </article>
                <div class="content-nav" aria-label="前後の記事">
                    <div class="content-nav_prev">
                        <?php previous_post_link('&laquo; %link'); ?>
                    </div>
                    <div class="content-nav_next">
                        <?php next_post_link('%link &raquo;'); ?>
                    </div>
                </div>
            </div>
            <div class="side-bar">
                <?php get_sidebar('supports'); ?>
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
        
    </main>
<?php get_footer(); ?>