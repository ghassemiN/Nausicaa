<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div id="single-post" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			<?php foundationpress_entry_meta(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<?php the_content(); ?>
		</div>
		<footer>
			<p>
				<span class="tags">
					<i class="fa fa-tag" aria-hidden="true"></i> <?php the_tags(''); ?>
				</span>
				
				<span class="categorys">
					<i class="fa fa-folder" aria-hidden="true"></i> <?php the_category(', ')  ?>
				</span>
			</p>
		</footer>
		<?php the_post_navigation(); ?>
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer();
