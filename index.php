<?php get_header(); ?>

<?php get_template_part('partials/page-title-bar.php');?>

<main>
<?php if (have_posts()): ?>
	<h2 class="recent-posts-header">All Posts</h2>
	<div class="cj-posts">
	<?php while (have_posts()): the_post();?>
		<article class="cj-post">
				<?php echo do_action('camjam_before_the_content'); ?>
				<?php ob_start();?>
				<?php the_post_thumbnail('medium_large');?>
				<?php $image = trim(strip_tags(ob_get_clean(), '<img><img/>'));?>
				<?php if (!empty($image)): ?>
				<span class="cj-post__image">
					<?php echo $image; ?>
				</span>
				<?php endif;?>
		<span class="cj-post__title"><a href="<?php the_permalink();?>"><?php the_title();?></a></span>
		<div class="cj-post__content">
			<?php echo wp_trim_words(get_the_content(), 25); ?>
		</div>
		<div class="cj-post__actions">
			<time datetime="<?php echo get_the_date('c'); ?>" class="cj-post__action"><fa-icon icon="calendar"></fa-icon> <?php echo get_the_date('m/d/y'); ?></time>
			<a class="cj-post__action" href="<?php the_permalink();?>">Read More</a>
		</div>
	</article>
	<?php endwhile;?>
	</div>
	<?php the_posts_pagination(['mid_size' => 2, 'prev_text' => '<fa-icon icon="angle-left"></fa-icon>', 'next_text' => '<fa-icon icon="angle-right"></fa-icon>']);?>
<?php endif;?>
</main>

<?php get_footer();