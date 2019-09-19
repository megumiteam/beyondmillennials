<div class="speakers-content">

	<?php
		$share_title = urlencode( get_the_title() . ' | ' . get_bloginfo( 'name' ) );
		$share_link  = urlencode( esc_url( get_permalink() ) );
	?>

	<h1 class="page-title"><?php the_title(); ?></h1>

	<div class="speakers-content-inner">
		<section class="speaker-lead">
		<?php
			$lead_ja = get_field( 'mu_speakers_lead_ja' );
			$lead_en = get_field( 'mu_speakers_lead_en' );
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
								'terms'    => 'keynote-speakers	',
							),
						)
					));
				if ( $keynote ) :
			?>
			<h3 class="speakers-subtitle">KEYNOTE SPEAKERS</h3>
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
								'terms'    => 'speakers'
							)
						)
					));
				if ( $normal ) :
			?>
			<h3 class="speakers-subtitle">SPEAKERS</h3>
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
