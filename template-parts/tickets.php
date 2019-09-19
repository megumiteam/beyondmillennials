<div class="tickets-content">
<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="page-title"><?php the_title(); ?></h1>
	<div class="tickets-content-inner">
		<section class="tickets-section">
			<h2 class="section-title"><?php the_field( 'mu_tickets_subtitle' ); ?></h2>

			<div class="tickets-section-lead">
				<?php
					$lead_ja = get_field( 'mu_tickets_text_ja' );
					$lead_en = get_field( 'mu_tickets_text_en' );
				?>
				<?php if ( $lead_ja ) : ?><div class="item" lang="ja"><?php echo $lead_ja; ?></div><?php endif; ?>
				<?php if ( $lead_en ) : ?><div class="item" lang="en"><?php echo $lead_en; ?></div><?php endif; ?>
			</div>
		</section>

		<?php
			$embed = get_field( 'mu_tickets_embed' );
			if ( $embed ) :
		?>
		<div class="tickets-embed"><?php echo $embed; ?></div>
		<?php endif; ?>

		<?php
			$note_ja = get_field( 'mu_tickets_notes_ja' );
			$note_en = get_field( 'mu_tickets_notes_en' );
			if ( $note_ja || $note_en ) :
		?>
		<section class="tickets-notes">
			<?php if ( $note_ja ) : ?>
			<div class="item" lang="ja"><?php echo $note_ja; ?></div>
			<?php endif; ?>

			<?php if ( $note_en ) : ?>
			<div class="item" lang="en"><?php echo $note_en; ?></div>
			<?php endif; ?>

		</section>
		<?php endif; ?>
	</div>
<?php endwhile; ?>
</div>
