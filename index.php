<?php get_header(); ?>
	<main id="main" class="site-main archive-site-main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/archives/article' ); ?>
			<?php endwhile; ?>
			<?php if ( function_exists( 'wwdj_archive_navigation' ) ) : ?>
				<?php wwdj_archive_navigation(); ?>
			<?php endif; ?>
		<?php else : ?>
		<?php endif; ?>
	</main><!-- .site-main -->
<?php get_footer(); ?>
