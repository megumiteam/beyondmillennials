<?php get_header(); ?>
	<main class="content page-content">
	<?php if ( have_posts() ) : ?>
		<?php if ( is_page( 'about' ) ) : ?>
			<?php include( 'template-parts/about.php' ); ?>
		<?php elseif ( is_page( 'speakers' ) ) : ?>
			<?php include( 'template-parts/speakers.php' ); ?>
		<?php elseif ( is_page( 'timetable' ) ) : ?>
			<?php include( 'template-parts/timetable.php' ); ?>
		<?php elseif ( is_page( 'session' ) ) : ?>
			<?php include( 'template-parts/session.php' ); ?>
		<?php elseif ( is_page( 'supporters' ) ) : ?>
			<?php include( 'template-parts/supporters.php' ); ?>
		<?php elseif ( is_page( 'tickets' ) ) : ?>
			<?php include( 'template-parts/tickets.php' ); ?>
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
