<div class="about-content">
	<?php while ( have_posts() ) : the_post(); ?>
	<section class="about-intro">
		<?php
			$share_title = urlencode( get_the_title() . ' | ' . get_bloginfo( 'name' ) );
			$share_link  = urlencode( esc_url( get_permalink() ) );
		?>

		<?php
			$title = get_field( 'title' );
			$subtitle_ja = get_field( 'subt-title-ja' );
			$subtitle_en = get_field( 'subt-title-en' );
			$lead_ja = get_field( 'lead-ja' );
			$lead_en = get_field( 'lead-en' );
		?>
		<h1 class="page-title"><?php echo $title; ?></h1>

		<h2 class="about-subtitle">
			<span lang="ja"><?php echo $subtitle_ja; ?></span>
			<span lang="en"><?php echo $subtitle_en; ?></span>
		</h2>

		<div class="about-lead">
			<div class="item" lang="ja"><?php echo $lead_ja; ?></div>
			<div class="item" lang="en"><?php echo $lead_en; ?></div>
		</div>

	</section>

	<section class="about-main">
		<?php the_content(); ?>
	</section>

	<section class="about-members">
		<?php
			$keynotes = get_posts(array(
					'post_type' => 'speaker',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'tax_query' => array(
						array(
							'taxonomy' => 'speaker_type',
							'field'    => 'slug',
							'terms'    => 'advisory-board-members	',
						),
					)
				));
			if ( $keynotes ) :
		?>
		<h3 class="member-title">ADVISORY BOARD MEMBERS</h3>
		<div class="member-lead">
			<?php
				$advisory_lead_ja = get_field( 'mashing-up_about--advisory-ja' );
				$advisory_lead_en = get_field( 'mashing-up_about--advisory-en' );
			?>
			<?php if ( $advisory_lead_ja ) : ?><div class="item" lang="ja"><?php echo $advisory_lead_ja; ?></div><?php endif; ?>
			<?php if ( $advisory_lead_en ) : ?><div class="item" lang="en"><?php echo $advisory_lead_en; ?></div><?php endif; ?>
		</div>
		<div class="speakers-list medium">
			<ul>
				<?php foreach ( $keynotes as $post ) : setup_postdata( $post ); ?>
				<li>
					<div class="popup">
						<?php include( 'popup-content.php' ); ?>
					</div>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
			</ul>
		</div>
		<?php endif; ?>

		<?php
			$comittie = get_posts(array(
					'post_type' => 'speaker',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'tax_query' => array(
						array(
							'taxonomy' => 'speaker_type',
							'field'    => 'slug',
							'terms'    => 'committee-members',
						),
					)
				));
			if ( $comittie ) :
		?>
		<h3 class="member-title">COMMITTEE MEMBERS</h3>
		<div class="member-lead">
			<?php
				$committee_lead_ja = get_field( 'mashing-up_about--committee-ja' );
				$committee_lead_en = get_field( 'mashing-up_about--committee-en' );
			?>
			<?php if ( $committee_lead_ja ) : ?><div class="item" lang="ja"><?php echo $committee_lead_ja; ?></div><?php endif; ?>
			<?php if ( $committee_lead_en ) : ?><div class="item" lang="en"><?php echo $committee_lead_en; ?></div><?php endif; ?>
		</div>
		<div class="speakers-list small">
			<ul>
				<?php foreach ( $comittie as $post ) : setup_postdata( $post ); ?>
				<li>
					<div class="popup">
						<?php include( 'popup-content.php' ); ?>
					</div>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
			</ul>
		</div>
		<?php endif; ?>

	</section>

<?php endwhile; ?>
</div>
