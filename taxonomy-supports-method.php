<?php get_header(); ?>
<main class="main archive">
    <div class="container">
        <div class="content-header">
            <h1><?php single_term_title(); ?></h1>
        </div>
        <div class="archive-content">
            <div class="archive-list">
                <?php if(have_posts()): ?>
                <?php while(have_posts()):
                    the_post();
                ?>
                <div class="content-body">
                    <?php get_template_part('template-parts/loop', 'supports'); ?>
                    <?php the_excerpt(); ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="pagination">
                    <?php
                        the_posts_pagination(
                            array(
                                'prev_text' => '&lt;<span class="sr-only">前</span>',
                                'next_text' => '<span class="sr-only">次</span>&gt;'
                            )
                        );
                    ?>
                </div>
                
            </div>
            <div class="side-bar">
                <?php get_sidebar('supports'); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>