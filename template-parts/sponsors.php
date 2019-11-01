<div class="supporters-content">
	<h1 class="page-title"><?php the_title(); ?></h1>

	<section class="supporters-content-inner section-decoration">
		<?php
			$get_sponsors =  get_terms( 'sponsor_type', array(
					'orderby' => 'menu_order'
				));
			if ( $get_sponsors ) :
		?>
		<?php foreach ( $get_sponsors as $get_sponsor ) : ?>
		<?php
			$slug = $get_sponsor->slug;

			$sponsor_item = get_posts(array(
					'post_type' => 'sponsor',
					'posts_per_page' => -1,
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
					<a href="<?php the_field( 'mu_sponsor_link_url' ); ?>" target="_blank"><?php the_post_thumbnail( 'full' ); ?></a>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>

	</section>

	<section class="supporters-collection">
		<?php
			$collection_title = get_field( 'mashing-up_sponsored--heading' );
			if ( !$collection_title ) {
				$collection_title = 'Show your support';
			}
		?>
		<div class="section-title"><?php echo $collection_title; ?></div>
		<?php
			$lead_ja = get_field( 'mashing-up_sponsored--lead_ja' );
			$lead_en = get_field( 'mashing-up_sponsored--lead_en' );

			$content_ja = get_field( 'mashing-up_sponsored--content_ja' );
			$content_en = get_field( 'mashing-up_sponsored--content_en' );

			$mail_text = get_field( 'mashing-up_sponsored--text' );
			$mail_mail = get_field( 'mashing-up_sponsored--email' );
		?>
		<div class="collenction-lead">
			<?php if ( $lead_ja ) : ?><div class="item" lang="ja"><?php echo $lead_ja; ?></div><?php endif; ?>
			<?php if ( $lead_en ) : ?><div class="item" lang="en"><?php echo $lead_en; ?></div><?php endif; ?>
		</div>
		<div class="collenction-text">
			<?php if ( $content_ja ) : ?><div class="item" lang="ja"><?php echo $content_ja; ?></div><?php endif; ?>
			<?php if ( $content_en ) : ?><div class="item" lang="en"><?php echo $content_en; ?></div><?php endif; ?>
		</div>
		<?php if ( $mail_text && $mail_mail ) : ?>
		<div class="button-link js-bubble"><a href="mailto:<?php echo $mail_mail; ?>"><?php echo $mail_text; ?></a></div>
		<?php endif; ?>
	</section>

</div>
