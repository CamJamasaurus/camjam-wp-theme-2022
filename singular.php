<?php get_header();

while (have_posts()): the_post();

?>

<div class="interior-page-content-has-sidebar">
    <main>
        <?php echo do_action('camjam_before_the_content'); ?>
        <?php the_post_thumbnail('full');?>
        <?php the_content();?>
        <?php if(get_post_type() === 'post') : ?>
        <?php next_post_link();?>
        <?php previous_post_link();?>
        <?php endif; ?>
    </main>
    <?php echo get_template_part('partials/sidebar'); ?>
</div>

<?php

endwhile;

get_footer();