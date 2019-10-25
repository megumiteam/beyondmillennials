<div class="speakers-content">

	<?php
		$share_title = urlencode( get_the_title() . ' | ' . get_bloginfo( 'name' ) );
		$share_link  = urlencode( esc_url( get_permalink() ) );
	?>

	<h1 class="page-title"><?php the_title(); ?></h1>

	<?php
	// スポンサーロゴ
		$image = get_field( 'mu_award_logo' );
		$size = 'full'; // (thumbnail, medium, large, full or custom size)
		if ( $image ) {
			echo wp_get_attachment_image( $image, $size );
		}
	?>

	<div class="speakers-content-inner">
		<section class="speaker-lead">
		<?php
			$lead_ja = get_field( 'mu_award_text_ja' );
			$lead_en = get_field( 'mu_award_text_en' );
		?>
			<?php if ( $lead_ja ) : ?> <div class="item" lang="ja"><?php echo $lead_ja; ?></div><?php endif; ?>
			<?php if ( $lead_en ) : ?> <div class="item" lang="en"><?php echo $lead_en; ?></div><?php endif; ?>
		</section>

		<section class="speakers-lists">
			<?php
				$keynote = get_posts(array(
						'post_type' => 'speaker',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'speaker_type',
								'field'    => 'slug',
								'terms'    => 'readers',
							),
						)
					));
				if ( $keynote ) :
			?>
			<h3 class="speakers-subtitle">READERS</h3>
				<?php
					$readers_ja = get_field( 'mu_readers_text_ja' );
					$readers_en = get_field( 'mu_readers_text_en' );
				?>
					<div class="reader-lead">
					<?php if ( $readers_ja ) : ?> <div class="item" lang="ja"><?php echo $readers_ja; ?></div><?php endif; ?>
					<?php if ( $readers_en ) : ?> <div class="item" lang="en"><?php echo $readers_en; ?></div><?php endif; ?>
					</div>

			<div class="speakers-list large">
				<ul>
					<?php foreach ( $keynote as $post ) : setup_postdata( $post ); ?>
					<li>
						<div class="popup" id="<?php echo $post->post_name; ?>">
							<?php include( 'popup-content.php' ); ?>
						</div>
					</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php
				$keynote = get_posts(array(
						'post_type' => 'speaker',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'speaker_type',
								'field'    => 'slug',
								'terms'    => 'game-changer',
							),
						)
					));
				if ( $keynote ) :
			?>
			<h3 class="speakers-subtitle">Game Changer</h3>
			<div class="speakers-list large">
				<ul>
					<?php foreach ( $keynote as $post ) : setup_postdata( $post ); ?>
					<li>
						<div class="popup" id="<?php echo $post->post_name; ?>">
							<?php include( 'popup-content.php' ); ?>
						</div>
					</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php
				$normal = get_posts(array(
						'post_type' => 'speaker',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'speaker_type',
								'field'    => 'slug',
								'terms'    => 'advisory-board-members'
							)
						)
					));
				if ( $normal ) :
			?>
			<h3 class="speakers-subtitle">ADVISORY BOARD</h3>
			<div class="speakers-list medium">
				<ul>
					<?php foreach ( $normal as $post ) : setup_postdata( $post ); ?>
					<li>
						<div class="popup" id="<?php echo $post->post_name; ?>">
							<?php include( 'popup-content.php' ); ?>
						</div>
					</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php endif; ?>
		</section>

	</div>

</div>
