<?php get_header();?>
<main class="interior-page-content">
<?php if (have_posts()): ?>
	<span>
		<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
			<fa-icon icon="caret-left"></fa-icon> Back to Main
		</a>
	</span>
	<div class="hyp-posts">
	<?php while (have_posts()): the_post();?>
		<article class="hyp-post">
			<?php echo do_action('camjam_before_the_content'); ?>
			<?php $image_url = get_the_post_thumbnail_url();?>
			<?php if ($image_url): ?>
			<span class="hyp-post__image" style="background-image: url(<?php echo $image_url; ?>)"> </span>
			<?php endif;?>
		<span class="hyp-post__title"><?php the_title();?></span>
		<div class="hyp-post__content">
			<?php echo wp_trim_words(get_the_content(), 25); ?>
		</div>
		<a href="<?php the_permalink();?>">Read More ></a>
	</article>
	<?php endwhile;?>
	</div>
	<?php the_posts_pagination(['prev_text' => null, 'next_text' => null]);?>
<?php endif;?>
</main>
<?php get_footer();