<?php get_header(); ?>
<main class="main page-news">
    <div class="container">
        <h1 class="archive-title"><?php the_title(); ?></h1>
        <div class="page-content">
            <div class="news-list">
                <div class="news-content">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                ));
                ?>
                
                <?php if($news_query->have_posts()): ?>
                    <?php while($news_query->have_posts()): ?>
                        <?php $news_query->the_post(); ?>
                        <?php get_template_part('template-parts/loop', 'post'); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                <p class="news-empty">お知らせはまだありません。</p>
                <?php endif; ?>
                </div>
                <div class="pagination">
                    <?php 
                        echo paginate_links([
                            'total' => $news_query->max_num_pages,
                            'current' => max(1, $paged)
                        ]);
                    ?>
                </div>
            </div>
            <div class="side-bar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>