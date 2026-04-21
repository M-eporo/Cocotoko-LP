<div class="sidebar">
    <?php if(is_active_sidebar('sidebar-widget-area')): ?>
    <aside class="aside">
        <?php dynamic_sidebar('sidebar-widget-area'); ?>
    </aside>
    <?php endif; ?>
    <!-- <aside>
        <?php $cats = get_categories(); ?>
        <?php foreach($cats as $cat): ?>
            <li><a href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a></li>
        <?php endforeach; ?>
    </aside> -->
</div>