<?php get_header(); ?>
<main class="content">
	<div class="blocks">
		<section class="block top-hero">
			<?php
				$sp_image = get_field( 'mashing-up_mobile_image', 'option' );
				if ( $sp_image ) :
			?>
			<div class="top-hero-image-sp"><img src="<?php echo $sp_image; ?>" alt=""></div>
			<?php endif; ?>

			<?php
				$type = get_field( 'mu_select_top_hero', 'option' );
			?>

			<?php if ( $type === 'youtube' ) : ?>
			<?php
				$youtube = get_field( 'mashing-up_youtube', 'option' );
				$youtube_id = str_replace( 'https://www.youtube.com/watch?v=', '', $youtube );

				$youtube_embed = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $youtube_id . '?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

				echo '<div class="top-hero-youtube">' . $youtube_embed . '</div>';
			?>
			<?php elseif ( $type === 'upload' ) : ?>
				<?php
					$movie  = get_field ( 'mashing-up_movie', 'option' );
					$poster = get_field( 'mashing-up_image', 'option' );

					if ( $movie ) {
						echo '<div class="top-hero-movie"><video muted autoplay loop poster="' . $poster . '" src="' . $movie['url'] . '"></video></div>';
					}
				?>
			<?php endif; ?>

			<?php
				$top_logo = get_field( 'mashing-up-logo', 'option' );
				if ( $top_logo ) :
			?>
			<div class="top-hero-logo"><img src="<?php echo $top_logo; ?>" alt=""></div>
			<?php endif; ?>
			<div class="scrollmore">
				<div class="scrollmore-inner">
					<div class="scrollmore-text">Scroll for more<span>Scroll for more</span></div>
				</div>
			</div>
		</section>

		<section class="block top-theme" id="theme">
			<h2 class="section-title"><?php the_field( 'mashing-up_event--title', 'option' ); ?></h2>
			<h3 class="theme-title"><span><?php the_field( 'mashing-up_event--subheading', 'option' ); ?></span></h3>

			<div class="theme-text-block">
				<div class="item" lang='ja'><?php the_field( 'mashing-up_event--content_ja', 'option' ); ?></div>
				<div class="item" lang='en'><?php the_field( 'mashing-up_event--content_en', 'option' ); ?></div>
			</div>

			<div class="button-link js-bubble"><a href="<?php the_field( 'mashing-up_event--url', 'option' ); ?>"><?php the_field( 'mashing-up_event--button_text', 'option' ); ?></a></div>

		</section>

		<section class="block top-speakers" id="speakers">
			<h2 class="section-title">Speakers</h2>

			<div class="top-speakers-lead">
				<div class="item" lang="ja"><?php the_field( 'mashing-up_speaker_ja', 'option' ); ?></div>
				<div class="item" lang="en"><?php the_field( 'mashing-up_speaker_en', 'option' ); ?></div>
			</div>

			<?php
				$keynotes = get_posts(array(
						'post_type' => 'speaker',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'meta_query' => array(
							array(
								'key' => 'mu_speaker_show_top',
								'value' => 1
							),
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'speaker_type',
								'field'    => 'slug',
								'terms'    => 'keynote-speakers',
							),
						)
					));
				if ( $keynotes ) :
			?>
			<h3 class="speakers-subtitle">KEYNOTE SPEAKERS</h3>
			<div class="speakers-list large">
				<ul>
					<?php foreach ( $keynotes as $post ) : setup_postdata( $post ); ?>
					<li>
						<div class="popup">
							<?php include( 'template-parts/popup-content.php' ); ?>
						</div>
					</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php
				$speakers = get_posts(array(
						'post_type' => 'speaker',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'meta_query' => array(
							array(
								'key' => 'mu_speaker_show_top',
								'value' => 1
							),
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'speaker_type',
								'field'    => 'slug',
								'terms'    => 'speakers'
							)
						)
					));
				if ( $speakers ) :
			?>
			<h3 class="speakers-subtitle">SPEAKERS</h3>
			<div class="speakers-list medium">
				<ul>
					<?php foreach ( $speakers as $post ) : setup_postdata( $post ); ?>
					<li>
						<div class="popup">
							<?php include( 'template-parts/popup-content.php' ); ?>
						</div>
					</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<div class="button-link js-bubble"><a href="<?php echo home_url( '/speakers/' ); ?>">MORE SPEAKERS</a></div>

			<?php
				$billboard_link = get_field( 'mashing-up_banner--url', 'option' );
				$billboard_image = get_field( 'mashing-up_banner--image', 'option' );
				if ( $billboard_link && $billboard_image ) :
			?>
			<div class="top-billboaed">
				<div class="billboaed-banner"><a href="<?php echo $billboard_link; ?>" target="_blank"><img src="<?php echo $billboard_image; ?>" alt=""></a></div>
			</div>
		<?php endif; ?>
		</section>

		<section class="block top-outline" id="outline">
			<h2 class="section-title">Outline</h2>

			<div class="outline-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.5101349414185!2d139.70178066525827!3d35.66443903019826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ca6f5ba36b3%3A0xff9a3ac635a94891!2z44CSMTUwLTAwMDEg5p2x5Lqs6YO95riL6LC35Yy656We5a6u5YmN77yV5LiB55uu77yT77yR!5e0!3m2!1sja!2sjp!4v1562325246448!5m2!1sja!2sjp" width="1080" height="470" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="outline-text">
				<div class="item" lang="ja"><?php the_field( 'mashing-up_outline--content_ja', 'option' ); ?></div>
				<div class="item" lang="en"><?php the_field( 'mashing-up_outline--content_en', 'option' ); ?></div>
			</div>
		</section>

		<section class="block top-sponsors" id="sponsors">
			<div class="sponsor-block section-decoration">
				<?php
					$sponsor_list = get_field( 'mashing-up_select-sponsor', 'option' );
					$get_sponsors =  get_terms( 'sponsor_type', array(
							'include' => $sponsor_list,
							'orderby' => 'menu_order'
						));
					if ( $get_sponsors ) :
				?>
				<?php foreach ( $get_sponsors as $get_sponsor ) : ?>
				<?php
					$slug = $get_sponsor->slug;

					$sponsor_item = get_posts(array(
							'post_type' => 'sponsor',
							'post_per_page' => -1,
							'orderby' => 'menu_order',
							'tax_query' => array(
								array(
									'taxonomy' => 'sponsor_type',
									'field'    => 'slug',
									'terms'    => $slug
								)
							)
						));
					if ( $sponsor_item ) :
				?>
				<h2 class="sponsor-subtitle"><?php echo $get_sponsor->name; ?></h2>
				<?php
					$list_type = get_field( 'mu_sponsor_size', 'sponsor_type_' . $get_sponsor->term_id );
					if ( empty( $list_type ) ) {
						$list_type = 'small';
					}
				?>
				<div class="sponsor-list <?php echo $list_type; ?>">
					<ul>
						<?php foreach ( $sponsor_item as $post ) : setup_postdata( $post ); ?>
						<li>
							<a href="<?php the_field( 'mu_sponsor_link_url' ); ?>" target="_blank"><?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'full' );
								} else {
									the_title();
								}
							?></a>
						</li>
						<?php endforeach; wp_reset_postdata(); ?>
					</ul>
				</div>
				<?php endif; ?>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>

			<?php
				$belt_image_pc = get_field( 'mashing-up_gallery', 'option' );
				$belt_image_sp = get_field( 'mashing-up_gallery-sp', 'option' );
			?>
			<div class="sponsors-image">
				<?php if ( $belt_image_pc ) : ?><img src="<?php echo $belt_image_pc; ?>" alt=""><?php endif; ?>
				<?php if ( $belt_image_sp ) : ?><img src="<?php echo $belt_image_sp; ?>" alt=""><?php endif; ?>
			</div>

		</section>

		<section class="block top-support" id="support">
			<?php
				$suppert = get_page_by_path( 'supporters' );
				$collection_title = get_field( 'mashing-up_sponsored--heading', $suppert->ID );
				if ( !$collection_title ) {
					$collection_title = 'Show your support';
				}
			?>
			<h2 class="section-title"><?php echo $collection_title; ?></h2>

			<?php
				$lead_ja = get_field( 'mashing-up_sponsored--lead_ja', $suppert->ID );
				$lead_en = get_field( 'mashing-up_sponsored--lead_en', $suppert->ID );

				$content_ja = get_field( 'mashing-up_sponsored--content_ja', $suppert->ID );
				$content_en = get_field( 'mashing-up_sponsored--content_en', $suppert->ID );

				$mail_text = get_field( 'mashing-up_sponsored--text', $suppert->ID );
				$mail_mail = get_field( 'mashing-up_sponsored--email', $suppert->ID );
			?>
			<div class="top-support-lead">
				<div class="item" lang="ja"><?php echo $lead_ja; ?></div>
				<div class="item" lang="en"><?php echo $lead_en; ?></div>
			</div>

			<div class="top-support-text">
				<div class="item" lang="ja"><?php echo $content_ja; ?></div>
				<div class="item" lang="en"><?php echo $content_en; ?></div>
			</div>

			<?php if ( $mail_text && $mail_mail ) : ?>
			<div class="button-link js-bubble"><a href="mailto:<?php echo $mail_mail; ?>"><?php echo $mail_text; ?></a></div>
			<?php endif; ?>

		</section>

		<?php include( 'template-parts/contact.php' ); ?>

	</div>
</main>
<?php get_footer(); ?>
