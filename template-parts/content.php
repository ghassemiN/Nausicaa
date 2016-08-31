<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
	<header>
		<?php foundationpress_entry_meta(); ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
	</div>
	<footer>
		<p>
			<?php $tag = get_the_tags(); if ( $tag ) { ?>
				<span class="tags">
					<i class="fa fa-tag" aria-hidden="true"></i> <?php the_tags(''); ?>
				</span>
			<?php } ?>
			<span class="categorys">
				<i class="fa fa-folder" aria-hidden="true"></i> <?php the_category(', ')  ?>
			</span>
		</p>
	</footer>
</div>
