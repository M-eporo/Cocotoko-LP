<?php
    $category_list = get_the_category();
    $category_slug = '';
    $category_name = '';
    if($category_list) {
        $category_slug = $category_list[0]->slug;
        $category_name = $category_list[0]->name;
    } 
?>
<dl id="post-<?php the_ID(); ?>" class="news-item">
    <a href="<?php the_permalink(); ?>"></a>
    <dt class="news-date"><?php echo get_the_date(); ?></dt>
    <?php if ($category_list): ?>
    <dd class="info-tag category-<?php echo esc_attr($category_slug); ?>">
        <?php echo esc_html($category_name); ?>
    </dd>
    <?php endif; ?>
    <dd class="news-text">
        <?php the_title(); ?>
        <?php the_excerpt(); ?>
    </dd>
</dl>