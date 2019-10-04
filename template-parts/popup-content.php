<div class="image curtain-action brick is-shrink">
	<div class="curtain-content"><?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'speakers_thumb' );
		}
	?></div>
	<span></span>
	<span></span>
</div>
<div class="text">
	<div class="name-ja" lang="ja"><span><?php the_title(); ?></span></div>
	<div class="job"><?php the_field( 'mu_ja_title', $post->ID ); ?></div>
</div>
<div class="popup-content">
	<div class="speakers-detail">
		<div class="speakers-header">
			<div class="image"><?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'speakers_detail' );
				}
			?></div>
			<div class="name-ja" lang="ja"><?php the_title(); ?></div>
			<div class="job"><?php the_field( 'mu_ja_title', $post->ID ); ?></div>
		</div>
		<?php
			$mu_ja = get_field( 'mu_ja_profile', $post->ID );
			$mu_en = get_field( 'mu_en_profile', $post->ID );
			if ( $mu_ja || $mu_en ) :
		?>
		<div class="speakers-profile<?php if ( empty( $mu_en ) ) { echo ' no-en'; } ?>">
			<div class="item" lang="ja"><?php echo $mu_ja; ?></div>
			<?php if ( $mu_en ) : ?><div class="item" lang="en"><?php echo $mu_en; ?></div><?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="footer-shares">
			<div class="shares-title">Share</div>
			<ul class="a2a_kit" data-a2a-url="<?php echo home_url( '/'); ?>" data-a2a-title="<?php bloginfo( 'name' ); ?>">
				<li class="facebook">
					<a href="/#facebook" class="a2a_button_facebook">
						<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 18 18"><path d="M17.007 0H.993A.993.993 0 0 0 0 .993v16.014A.993.993 0 0 0 .993 18h8.628v-6.961H7.278V8.314h2.343v-2a3.274 3.274 0 0 1 3.494-3.591 19.925 19.925 0 0 1 2.092.106v2.43h-1.428c-1.13 0-1.35.534-1.35 1.322v1.73h2.7l-.351 2.725h-2.364V18h4.593a.993.993 0 0 0 .993-.993V.993A.993.993 0 0 0 17.007 0z"/></svg>
					</a>
				</li>
				<li class="twitter">
					<a href="/#twitter" class="a2a_button_twitter">
						<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 19 15.411"><path d="M6.017 15.411A10.985 10.985 0 0 0 17.1 4.328V3.8A8.58 8.58 0 0 0 19 1.794a8.762 8.762 0 0 1-2.217.633A4.107 4.107 0 0 0 18.472.316a9.682 9.682 0 0 1-2.428.95A3.77 3.77 0 0 0 13.194 0a3.966 3.966 0 0 0-3.906 3.906 2.058 2.058 0 0 0 .106.844A10.913 10.913 0 0 1 1.372.633a4.042 4.042 0 0 0-.528 2.006 4.194 4.194 0 0 0 1.689 3.272 3.558 3.558 0 0 1-1.794-.528 3.858 3.858 0 0 0 3.167 3.8 3.254 3.254 0 0 1-1.056.106 1.8 1.8 0 0 1-.739-.106 4 4 0 0 0 3.694 2.744 7.97 7.97 0 0 1-4.856 1.689 2.922 2.922 0 0 1-.95-.106 9.963 9.963 0 0 0 6.017 1.9" fill-rule="evenodd"/></svg>
					</a>
				</li>
			</ul>
		</div>

	</div>
</div>
