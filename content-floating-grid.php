<?php
/**
 * @package Themolio
 */
?>
<?php 
global $themolio_options, $loop_iteration; 
?>
<?php
    if($themolio_options['grid_columns'] == 2)
        $gridclass = "grid-horizontal-col-2";
    elseif($themolio_options['grid_columns'] == 3)
        $gridclass = "grid-horizontal-col-3";
    elseif($themolio_options['grid_columns'] == 4)
        $gridclass = "grid-horizontal-col-4";
?>

<?php if ($loop_iteration + 1 == $themolio_options['grid_columns']): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid-horizontal '.$gridclass); ?>>
<?php
$widgetdata=array (
    'title' => 'Håll dig uppdaterad',
    'instruction' => 'Med vårt nyhetsbrev håller du dig uppdaterad kring våra event. Lägg till din epostadress så meddelar vi dig när vi har något på gång',
    'lists' => 
        array (
            0 => '1',
        ),
        'lists_name' => 
        array (
            1 => 'Event list',
        ),
        'autoregister' => 'not_auto_register',
        'labelswithin' => 'labels_within',
        'customfields' => 
        array (
            'firstname' => 
        array (
            'column_name' => 'firstname',
            'label' => 'First name',
        ),
            'lastname' => 
        array (
            'column_name' => 'lastname',
            'label' => 'Last name',
        ),
            'email' => 
        array (
            'label' => 'Epost',
        ),
    ),
    'submit' => 'Do it!',
    'success' => 'Kontrollera din inbox nu och bekräfta din prenumeration.',
    'widget_id' => 'wysija-2-php',
);
$widgetNL=new WYSIJA_NL_Widget(1);
$subscriptionForm= $widgetNL->widget($widgetdata,$widgetdata);
echo $subscriptionForm;
?>
</article>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid-horizontal '.$gridclass); ?>>
    <?php if(trim(get_the_post_thumbnail($post->ID)) != '' and $themolio_options['show_featured']): ?>
    <div class="grid-thumb">
        <a href="<?php the_permalink(); ?>">
        <?php if($themolio_options['grid_columns'] == 2 and !$themolio_options['show_sidebar_grid'])
            the_post_thumbnail('themolio-two-col-grid-image-nosidebar');
        elseif($themolio_options['grid_columns'] == 3 and !$themolio_options['show_sidebar_grid'])
            the_post_thumbnail('themolio-three-col-grid-image-nosidebar');
        elseif($themolio_options['grid_columns'] == 4 and !$themolio_options['show_sidebar_grid'])
            the_post_thumbnail('themolio-four-col-grid-image-nosidebar');
        elseif($themolio_options['grid_columns'] == 2 and $themolio_options['show_sidebar_grid'])
            the_post_thumbnail('themolio-two-col-grid-image-sidebar');
        elseif($themolio_options['grid_columns'] == 3 and $themolio_options['show_sidebar_grid'])
            the_post_thumbnail('themolio-three-col-grid-image-sidebar');
        elseif($themolio_options['grid_columns'] == 4 and $themolio_options['show_sidebar_grid'])
            the_post_thumbnail('themolio-four-col-grid-image-sidebar');
        ?>
        </a>
    </div>
    <?php endif; ?>
    <h2 class="entry-title grid-title"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'themolio'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <div class="entry-meta grid-meta">
        <?php themolio_posted_on(); ?>
        <?php if(comments_open() && ! post_password_required()) : ?>
        <?php comments_popup_link(__('Reply', 'themolio'), _x('1 Comment', 'comments number', 'themolio'), _x('% Comments', 'comments number', 'themolio'), 'entry-comments'); ?>
        <?php endif; ?>
    </div>
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
</article>