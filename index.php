<?php
/**
 * @package Themolio
 */
?>
<?php global $themolio_options, $themolio_is_mobile; ?>
<?php get_header(); ?>
<?php if(($themolio_options['blog_style'] == 'grid' || $themolio_options['blog_style'] == 'flowGrid' and !$themolio_options['show_sidebar_grid']) or $themolio_is_mobile) {
    $containerclass = ' fullcontainer';
} else {
    $containerclass = '';
} ?>
<?php $loop_iteration = 0; ?>
<div class="container<?php echo $containerclass; ?>">
    <?php if(have_posts()): ?>
        <div <?php if ( is_front_page() ) { echo 'id="flowGrid"'; } ?>>
        <?php while(have_posts()) : the_post(); ?>
            <?php if($themolio_options['blog_style'] == 'flowGrid' and !$themolio_is_mobile): ?>
                <?php get_template_part('content', 'floating-grid'); ?>
            <?php elseif($themolio_options['blog_style'] == 'grid' and !$themolio_is_mobile): ?>
                <?php if($themolio_options['grid_layout'] == 'top-bottom'): ?>
                    <?php get_template_part('content', 'grid-top-bottom'); ?>
                <?php elseif($themolio_options['grid_layout'] == 'left-right'): ?>
                     <?php get_template_part('content', 'grid-left-right'); ?>
                <?php endif; ?>
            <?php else: ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endif; ?>
            <?php $loop_iteration++; ?>
        <?php endwhile; ?>
        </div>
        <?php if($themolio_options['blog_style'] == 'grid' and $themolio_options['grid_layout'] == 'top-bottom'): ?>
            </div><div class="clear"></div>
        <?php endif; ?>
        <?php themolio_get_pagination(); ?>
    <?php else: ?>
    <article id="post-0" class="post">
        <h2 class="entry-title missing-title"><?php _e('Missing!','themolio'); ?></h2>
        <div class="entry-content">
            <p><?php _e('No posts were found. Try using the search form below','themolio'); ?></p>
            <p><?php get_search_form(); ?></p>
        </div>
    </article>
    <?php endif; ?>
</div>
<?php if(((($themolio_options['blog_style'] == 'grid' || $themolio_options['blog_style'] == 'flowGrid') && $themolio_options['show_sidebar_grid']) || $themolio_options['blog_style'] != 'grid' || $themolio_options['blog_style'] != 'flowGrid') && !$themolio_is_mobile && $themolio_options['show_sidebar_grid']) : ?>
<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>