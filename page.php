<?php get_header(); ?>
	<main class="content page-content">
	<?php if ( have_posts() ) : ?>
		<?php if ( is_page( 'about' ) ) : ?>
			<?php get_template_part( 'template-parts/about' ); ?>
		<?php elseif ( is_page( 'speakers' ) ) : ?>
			<?php get_template_part( 'template-parts/speakers' ); ?>
		<?php elseif ( is_page( 'award' ) ) : ?>
			<?php get_template_part( 'template-parts/award' ); ?>
		<?php elseif ( is_page( 'timetable' ) ) : ?>
			<?php get_template_part( 'template-parts/timetable' ); ?>
		<?php elseif ( is_page( 'session' ) ) : ?>
			<?php get_template_part( 'template-parts/session' ); ?>
		<?php elseif ( is_page( 'sponsors' ) ) : ?>
			<?php get_template_part( 'template-parts/sponsors' ); ?>
		<?php elseif ( is_page( 'tickets' ) ) : ?>
			<?php get_template_part( 'template-parts/tickets' ); ?>
		<?php else : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php else : ?>
	<?php endif; ?>
	</main>

	<?php if ( is_page( 'about' ) ) : ?>
	<?php
		$show_flag = get_field( 'mashing-up_about--contact' );
		if ( $show_flag ) :
	?>
	<?php include( 'template-parts/contact.php' ); ?>
	<?php endif; endif; ?>

<?php get_footer(); ?>
