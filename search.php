<?php get_header(); ?>
<main class="main search">
    <div class="container">
        <div class="search-header">
            <h1>検索結果</h1>
        </div>
        <div class="result-content">
            <div class="content-body">
            <?php if(have_posts()): ?>
                <p class="search-result">「<?php the_search_query(); ?>」の検索結果</p>
                <?php while(have_posts()):
                the_post();
                ?>
                <?php get_template_part('template-parts/loop', 'post'); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="search-none">見つかりませんでした。</p>
                <?php get_search_form(); ?>
            <?php endif; ?>
            </div>
            <div class="side-bar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>