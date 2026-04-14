<div class="sidebar">
    <?php if(is_active_sidebar('sidebar-widget-area')): ?>
    <aside class="aside">
        <!-- <div class="widget-block">
            <h2 class="widget-title">カテゴリー</h2>
            <ul class="wp-block-category">
                <li><a href="">お知らせ</a></li>
                <li><a href="">イベント</a></li>
                <li><a href="">SNS</a></li>
                <li><a href="">その他</a></li>
            </ul>
        </div> -->
        <?php dynamic_sidebar('sidebar-widget-area'); ?>
    </aside>
    <?php endif; ?>
</div>